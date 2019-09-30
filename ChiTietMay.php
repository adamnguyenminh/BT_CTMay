<?php
    abstract class ChiTietMay{
        private $MaSo;

        public function GetMay($MaSo){
            return $this->MaSo = $MaSo;
        }

        public function KTNULL($a){
            if(!(empty($a))){
                return 1;
            }
            return 0;
        }


        public function KT($bien)
        {
            if($bien > 0 && !(empty($bien))){
                return 1;
            }
            return 0;
        }

        abstract function Nhap();
        abstract function Xuat();
        abstract function TinhGia();
        abstract function TinhKL();
    }

    class ChiTietDon extends ChiTietMay{
        protected $Gia;
        protected $KL;
        protected $masoDon;

        public function Nhap()
        {
            do{
                $MASO= Readline("Nhap Ma Chi Tiet Don:");
            }while($this->KTNULL($MASO) != 1);
            $this->masoDon = $this->GetMay($MASO);
            do{
                $GIA = Readline("Nhap Gia Tien:");
            }while($this->KT($GIA) != 1);
            $this->Gia = $GIA;

            do{
                $KHOILUONG = Readline("Nhap Khoi Luong:");
            }while($this->KT($KHOILUONG) != 1);
            $this->KL = $KHOILUONG;
        }

        public function Xuat()
        {
            echo "-------------------------Chi Tiet Don---------------------\n";
            echo "\n|| Ma So Don: ".$this->GetMay($this->masoDon);
            echo "\n|| Gia cua chi tiet: ". $this->TinhGia();
            echo "\n|| Khoi Luong cua chi tiet: ". $this->TinhKL() . "\n"."----------------------------------------------------------";
        }

        public function TinhGia()
        {
            return $this->Gia;
        }
        public function TinhKL()
        {
            return $this->KL;
        }
    }

    interface KTLOAI{
        public function KTLOAI($a);
    }

    class ChiTietPhuc extends ChiTietMay implements KTLOAI {
        protected $DS_CT = array();
        protected $DS_AllGia = array();
        protected $DS_AllKL = array();
        protected $SUM_AllGia = array();
        public $SoluongCT;
        public $Loai;
        protected $masophuc;

        public function KTLOAI($a)
        {
            if(($a == 1 || $a == 2) && !empty($a)){
                return 1;
            }
            return 0;
        }

        public function Nhap()
        {
            do{
                $MASO= Readline("Nhap Ma Chi Tiet Phuc:");
            }while($this->KTNULL($MASO) != 1);
            $this->masophuc = $this->GetMay($MASO);

            do{
                $SoluongCT = Readline("Nhap So Luong CT:");
            }while($this->KT($SoluongCT) != 1);
            $this->SoluongCT = $SoluongCT;

            $item = NULL;
            for($i=1; $i <= $this->SoluongCT; $i++){
                echo "-------------------------------------------------------------------\n";
                do{
                    $LOAI = Readline("Nhap Loai Chi Tiet (So 1 - Chi tiet don / So 2 - Chi tiet phuc):");
                }while($this->KT($LOAI) != 1 || $this->KTLOAI($LOAI) != 1);
                $this->Loai = $LOAI;
                echo "\n-------------------------------------------------------------------\n";
                if($this->Loai == 1){
                    $item = new CHITIETDON();
                }else if($this->Loai == 2){
                    $item = new CHITIETPHUC();
                }
                $item->Nhap();
                array_push($this->DS_CT,$item);
                array_push($this->DS_AllGia,$item->TinhGia());
                array_push($this->DS_AllKL,$item->TinhKL());
            }
        }

        public function Xuat()
        {
            echo "-------------------Chi Tiet phuc Co-------------------------"."Ma So Chi Tiet Phuc: ".$this->GetMay($this->masophuc)."\n";
            foreach ($this->DS_CT as $item){
                echo $item->Xuat();
            }

            echo "\nTong Gia Tien chi tiet may: " . $this->TinhGia();
            echo "\nTong Khoi Luong chi tiet may: " . $this->TinhKL();
        }

        public function TinhGia()
        {
            return array_sum($this->DS_AllGia);
        }

        public function TinhKL()
        {
            return array_sum($this->DS_AllKL) . "\n";
        }
    }

//$may = new ChiTietPhuc();
//$may->Nhap();
//$may->Xuat();
//$may->TinhGia();
//$may->TinhKL();

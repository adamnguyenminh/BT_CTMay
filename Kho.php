<?php
    include_once "May.php";
    class Kho extends ChiTietMay{
        protected $TenKho;
        protected $DS_MAY = array();
        protected $SUM_GIAMAY = array();
        protected $SUM_KLMAY = array();
        protected $DS_MAMAY = array();
        protected $SL_May;
        public function Nhap()
        {
            do{
                $this->TenKho= Readline("Nhap Ten Kho:");
            }while($this->KTNULL($this->TenKho) != 1);
            do{
                $SL = Readline("Nhap So Luong May:");
            }while($this->KT($SL) != 1);
            $this->SL_May = $SL;

            for($i = 1; $i <= $this->SL_May; $i++){
                $may = new May();
                $may->Nhap();
                array_push($this->DS_MAY , $may);
                array_push($this->SUM_GIAMAY, $may->TinhGia());
                array_push($this->SUM_KLMAY,$may->TinhKL());
                array_push($this->DS_MAMAY,$may->GetMaMay());
            }
        }

        public function TimKiemMay(){
            echo "\n---------------MUC TIM KIEM----------------\n";
            do{
                $TK_MAY = Readline("Nhap ma may ban muon tim:");
            }while($this->KTNULL($TK_MAY) != 1);
            foreach ($this->DS_MAMAY as $mamay){
                if($TK_MAY == $mamay){
                    echo "Trong kho co may ban tim kiem\n"; break;
                }else{
                    echo "Trong kho khong co may ban tim\n";
                    do{
                        $bien = Readline("Ban co muon tim kiem tiep khong? Nhan Y/N:");
                    }while(is_numeric($bien) || $bien != "Y" && $bien !="N");
                    if($bien == "Y"){
                        $this->TimKiemMay();
                    }else{
                        break;
                    }
                }
            }
        }

        public function Xuat()
        {
            echo "\n||------- Kho: ".$this->TenKho." co ".$this->SL_May." May, Bao gom: ------"."\n";
            foreach ($this->DS_MAY as $item){
                echo $item->Xuat();
            }
            echo "\nTong Gia Tien May trong kho: " . $this->TinhGia();
            echo "\nTong Khoi Luong May trong kho: " . $this->TinhKL();
            $this->TimKiemMay();
        }

        public function TinhGia()
        {
            return array_sum($this->SUM_GIAMAY);
        }

        public function TinhKL()
        {
            return array_sum($this->SUM_KLMAY);
        }

    }
$kho = new Kho();
$kho->Nhap();
$kho->Xuat();
//$kho->TimKiemMay();

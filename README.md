CHECK LIST
VIẾT CHƯƠNG TRÌNH GIẢI QUYẾT BÀI TOÁN CHI TIẾT MÁY
    • 1 lớp abstract ChiTietMay
    • 1 interface KTLOAI
    • 1 lớp ChiTietDon và 1 lớp ChiTietPhuc kế thừa lớp ChiTietMay
    • 1 lớp May kế thừa lớp ChiTietPhuc
    • 1 lớp Kho kế thừa lớp ChiTietMay

STEP 01:
    • Class ChiTietMay
+ Xác định các hàm chung được các class con kế thừa xài lại: 
    1. Hàm nhập
    2. Hàm xuất
    3. Hàm tính giá
    4. Hàm tính

+ Các hàm kiểm tra chung
    1. Hàm kiểm tra khác rỗng
    2. Hàm kiểm tra số nguyên
    3. Hàm kiểm tra số dương

STEP 02:
    • Class ChiTietDon
+ Nhập mã số chi tiết đơn
    • Kiểm tra đã nhập chưa?(khác rỗng).

+ Nhập giá tiền, khối lượng máy
    • Kiểm tra đã nhập chưa?(khác rỗng).
    • Kiểm tra nhập số hay chữ?(nếu là chữ sẽ bắt nhập lại đến khi nhập đúng là số thì mới tiếp tục).

STEP 03:
    • Class ChiTietPhuc
+ Nhập mã số chi tiết phức
    • Kiểm tra đã nhập chưa?(khác rỗng).

+ Nhập số lượng chi tiết 
    • Kiểm tra đã nhập số chưa?
    • Kiểm tra nhập số không cho nhập chữ.
    • Kiểm tra nhập cho số dương không cho nhập số âm.

+ Nhập loại chi tiết 
    • Kiểm tra đã nhập loại chi tiết chưa?
    • Kiểm tra loại nhập theo hai trường hợp(1_Chi tiết đơn/2_Chi tiết phức). Nếu không thuộc trong những trường hợp này bắt nhập lại.

STEP 04:
	+ Nhập mã số máy và tên máy
    • Kiểm tra đã nhập thông tin máy chưa?

STEP 05:
	+ Nhập tên kho
    • Kiểm tra đã nhập tên kho chưa?

+ Nhập số lượng máy trong kho
    • Kiểm tra đã nhập số lượng máy chưa?
    • Kiểm tra nhập số lượng là số âm hay dương(Nếu là số âm bắt nhập lại cho đến khi nhập đúng số dương thì pass).




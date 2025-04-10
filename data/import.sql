DROP DATABASE IF EXISTS quan_ly_sach;
CREATE DATABASE quan_ly_sach;

USE quan_ly_sach;

DROP TABLE IF EXISTS categories;
CREATE TABLE categories (
    category_id INT PRIMARY KEY AUTO_INCREMENT,
    category_name VARCHAR(50),
    description VARCHAR(200)
);

DROP TABLE IF EXISTS books;
CREATE TABLE books (
    book_id INT PRIMARY KEY AUTO_INCREMENT,
    title VARCHAR(200),
    author VARCHAR(100),
    publication_date DATE,
    price DECIMAL(10,2),
    quantity INT,
    category_id INT,
    FOREIGN KEY (category_id) REFERENCES categories(category_id)
);

-- insert category:
INSERT INTO categories (category_name, description) VALUES ('Khoa học', 'Sách về các lĩnh vực khoa học tự nhiên và xã hội');
INSERT INTO categories (category_name, description) VALUES ('Văn học', 'Sách về các tác phẩm văn học trong và ngoài nước');
INSERT INTO categories (category_name, description) VALUES ('Kinh tế', 'Sách về kinh tế, tài chính, ngân hàng');
INSERT INTO categories (category_name, description) VALUES ('Lịch sử', 'Sách về lịch sử Việt Nam và thế giới');
INSERT INTO categories (category_name, description) VALUES ('Ngoại ngữ', 'Sách về các ngôn ngữ nước ngoài');

-- insert books:
INSERT INTO books (title, author, publication_date, price, quantity, category_id) VALUES ('Vật lý đại cương', 'Nguyễn Văn A', '2020-01-01', 100000, 10, 1);
INSERT INTO books (title, author, publication_date, price, quantity, category_id) VALUES ('Toán cao cấp', 'Trần Thị B', '2019-05-15', 120000, 5, 1);
INSERT INTO books (title, author, publication_date, price, quantity, category_id) VALUES ('Truyện Kiều', 'Nguyễn Du', '1820-01-01', 80000, 20, 2);
INSERT INTO books (title, author, publication_date, price, quantity, category_id) VALUES ('Số đỏ', 'Vũ Trọng Phụng', '1936-01-01', 90000, 15, 2);
INSERT INTO books (title, author, publication_date, price, quantity, category_id) VALUES ('Kinh tế vi mô', 'Lê Văn C', '2021-03-10', 150000, 8, 3);
INSERT INTO books (title, author, publication_date, price, quantity, category_id) VALUES ('Tài chính doanh nghiệp', 'Phạm Thị D', '2022-02-20', 180000, 3, 3);
INSERT INTO books (title, author, publication_date, price, quantity, category_id) VALUES ('Lịch sử Việt Nam', 'Hoàng Văn E', '2018-11-05', 110000, 12, 4);
INSERT INTO books (title, author, publication_date, price, quantity, category_id) VALUES ('Lịch sử thế giới', 'Đỗ Thị F', '2017-09-25', 130000, 7, 4);
INSERT INTO books (title, author, publication_date, price, quantity, category_id) VALUES ('Tiếng Anh giao tiếp', 'Nguyễn Văn G', '2023-04-01', 160000, 6, 5);
INSERT INTO books (title, author, publication_date, price, quantity, category_id) VALUES ('Tiếng Nhật sơ cấp', 'Trần Thị H', '2022-12-15', 190000, 2, 5);
INSERT INTO books (title, author, publication_date, price, quantity, category_id) VALUES ('Giải tích 1', 'Nguyễn Văn K', '2021-06-30', 115000, 9, 1);
INSERT INTO books (title, author, publication_date, price, quantity, category_id) VALUES ('Văn học Việt Nam hiện đại', 'Lê Thị L', '2020-08-20', 125000, 14, 2);
INSERT INTO books (title, author, publication_date, price, quantity, category_id) VALUES ('Đầu tư chứng khoán', 'Phạm Văn M', '2023-01-10', 170000, 4, 3);
INSERT INTO books (title, author, publication_date, price, quantity, category_id) VALUES ('Chiến tranh thế giới thứ hai', 'Đỗ Văn N', '2019-10-01', 135000, 11, 4);
INSERT INTO books (title, author, publication_date, price, quantity, category_id) VALUES ('Tiếng Pháp cơ bản', 'Trần Thị O', '2022-05-05', 200000, 1, 5);
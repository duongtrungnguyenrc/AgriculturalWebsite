-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Máy chủ: localhost
-- Thời gian đã tạo: Th5 17, 2023 lúc 05:11 PM
-- Phiên bản máy phục vụ: 10.4.27-MariaDB
-- Phiên bản PHP: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `Field Fresh`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `Comment`
--

CREATE TABLE `Comment` (
  `comment_id` int(11) NOT NULL,
  `comment_time` datetime NOT NULL,
  `user_name` varchar(255) NOT NULL,
  `product_name` varchar(255) NOT NULL,
  `comment` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `Comment`
--

INSERT INTO `Comment` (`comment_id`, `comment_time`, `user_name`, `product_name`, `comment`) VALUES
(19, '2023-05-17 04:02:28', 'nguyendeptrai', 'Coconut', 'I love coconut'),
(20, '2023-05-17 11:19:00', 'hoangnguyen01', 'Mango', 'I love mango');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `Customer`
--

CREATE TABLE `Customer` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `birth` date NOT NULL,
  `gender` varchar(6) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(10) NOT NULL,
  `address` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `Customer`
--

INSERT INTO `Customer` (`id`, `name`, `birth`, `gender`, `email`, `phone`, `address`) VALUES
(1, 'Duong Trung Nguyen', '2003-09-02', 'Male', 'duongtrungnguyenrc@gmail.com', '0855004714', '202-Bình Định, 3695-Hoài Ân, 90768-Ân Tường Tây, Đội 6'),
(5, 'Nguyen Duong Trung', '2023-05-09', 'Male', '52100824@student.tdtu.edu.vn', '0855004714', '262-Bình Định,2140-Huyện Hoài Ân,370313-Xã Ân Tường Tây, Đội 6'),
(6, 'Nguyen Duong Trung', '2003-08-12', 'Male', '52100824@student.tdtu.edu.vn', '0855004714', 'undefined,2194-Huyện Phù Cừ,220713-Xã Tống Phan,yangho quan 7'),
(7, 'Đường Trung Phê', '2023-05-09', 'Male', 'duongtrungpherc@gmail.com', '0855004714', '269-Lào Cai,2264-Huyện Si Ma Cai,80202-Xã Cán Cấu,Abc'),
(8, 'Nguyen Trung C', '2023-05-08', 'Male', 'duong@gmail.con', '0855004714', '268-Hưng Yên,2046-Huyện Văn Lâm,220909-Xã Tân Quang,đâs'),
(9, 'Đường Trung Nguyên', '2023-05-18', 'Male', 'duongtrungnguyenrc@gmail.com', '0855004714', '268-Hưng Yên,2046-Huyện Văn Lâm,220910-Xã Trưng Trắc,yangho quan 7'),
(10, 'Trần Thị Hoàng Nguyên', '2003-12-06', 'Female', 'tranthihoangnguyen@gmail.com', '0337941838', '262-Bình Định,2140-Huyện Hoài Ân,370312-Xã Ân Tường Đông,Trí Tường'),
(11, 'Đường Trung Nguyên', '2017-05-17', 'Male', 'duongtrungnguyenrc@gmail.com', '0855004714', '262-Bình Định,2140-Huyện Hoài Ân,370313-Xã Ân Tường Tây,yangho quan 7');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `Date_Report`
--

CREATE TABLE `Date_Report` (
  `update_date` date NOT NULL,
  `new_order` int(11) NOT NULL DEFAULT 0,
  `completed_order` int(11) NOT NULL DEFAULT 0,
  `revenue` double NOT NULL DEFAULT 0,
  `profit` double NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `Date_Report`
--

INSERT INTO `Date_Report` (`update_date`, `new_order`, `completed_order`, `revenue`, `profit`) VALUES
('2023-04-16', 0, 3, 200000, 170000),
('2023-04-17', 0, 1, 100000, 30000),
('2023-04-18', 0, 2, 520000, 30000),
('2023-04-19', 0, 14, 1333738, 0),
('2023-04-20', 0, 0, 0, 0),
('2023-04-21', 0, 24, 2769000, 0),
('2023-04-22', 0, 2, 473000, 0),
('2023-04-29', 0, 0, 530000, 0),
('2023-04-30', 0, 0, 123000, 0),
('2023-05-01', 0, 3, 441000, 0),
('2023-05-03', 0, 2, 148000, 0),
('2023-05-07', 0, 1, 129500, 0),
('2023-05-08', 0, 2, 0, 0),
('2023-05-09', 0, 1, 0, 0),
('2023-05-11', 0, 2, 72500, 0),
('2023-05-12', 0, 4, 1000000, 0),
('2023-05-13', 0, 5, 917500, 0),
('2023-05-14', 0, 8, 1457990, 0),
('2023-05-15', 0, 1, 89490, 0),
('2023-05-16', 0, 6, 1830960, 0),
('2023-05-17', 0, 7, 3207950, 0);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `Discount`
--

CREATE TABLE `Discount` (
  `id` int(11) NOT NULL,
  `valid_date` date NOT NULL,
  `invalid_date` date NOT NULL,
  `discount_code` varchar(20) NOT NULL,
  `discount_percentage` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `Discount`
--

INSERT INTO `Discount` (`id`, `valid_date`, `invalid_date`, `discount_code`, `discount_percentage`) VALUES
(2, '2023-05-14', '2023-05-19', 'HAPPYFF', 10),
(3, '2023-05-10', '2023-05-12', 'WORRYFF', 100),
(5, '2023-05-16', '2023-05-19', 'NGUYENDEPTRAI', 10),
(6, '2023-05-09', '2023-05-26', 'NGUYENDEPTRAIAC', 20);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `Notifycations`
--

CREATE TABLE `Notifycations` (
  `user_name` varchar(255) NOT NULL,
  `message` varchar(255) NOT NULL,
  `status` varchar(11) NOT NULL DEFAULT 'waiting'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `Notifycations`
--

INSERT INTO `Notifycations` (`user_name`, `message`, `status`) VALUES
('banhvanphe', 'Your order id 196 has been confirmed!', 'waiting'),
('banhvanphe', 'Your order id 196 has been completed!', 'waiting'),
('nguyendeptrai', 'Your order id 197 has been confirmed!', 'waiting'),
('nguyendeptrai', 'Your order id 197 has been confirmed!', 'waiting'),
('ADMIN', 'alo alo 1234', 'waiting'),
('banhvanphe', 'alo alo 1234', 'waiting'),
('nguyendeptrai', 'alo alo 1234', 'waiting'),
('nguyendeptrai', 'test', 'waiting'),
('banhvanphe', 'banhvanphe', 'waiting'),
('nguyendeptrai', 'Your order id 197 has been completed!', 'waiting'),
('ADMIN', '', 'waiting'),
('banhvanphe', '', 'waiting'),
('hoangnguyen01', '', 'waiting'),
('nguyendeptrai', '', 'waiting'),
('nguyendeptrai', 'Your order id 201 has been confirmed!', 'waiting');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `Order`
--

CREATE TABLE `Order` (
  `id` int(11) NOT NULL,
  `total_prices` double NOT NULL,
  `delivery_prices` double NOT NULL DEFAULT 0,
  `discount` double NOT NULL,
  `creation_date` date NOT NULL,
  `status` varchar(10) NOT NULL DEFAULT 'pending',
  `customer_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `Order`
--

INSERT INTO `Order` (`id`, `total_prices`, `delivery_prices`, `discount`, `creation_date`, `status`, `customer_id`) VALUES
(190, 412000, 36500, 0, '2023-05-16', 'completed', 5),
(196, 670000, 44000, 10, '2023-05-17', 'completed', 7),
(197, 820000, 36500, 10, '2023-05-17', 'completed', 5),
(198, 140000, 44000, 0, '2023-05-17', 'process', 9),
(199, 270000, 36500, 10, '2023-05-17', 'pending', 10),
(200, 83000, 36500, 10, '2023-05-17', 'pending', 11),
(201, 155000, 36500, 0, '2023-05-17', 'process', 5);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `Order_Detail`
--

CREATE TABLE `Order_Detail` (
  `order_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `unit` varchar(10) NOT NULL DEFAULT '''kg''',
  `price` double NOT NULL,
  `product_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `Order_Detail`
--

INSERT INTO `Order_Detail` (`order_id`, `quantity`, `unit`, `price`, `product_name`) VALUES
(190, 1, 'kg', 12000, 'Lemon'),
(190, 2, 'kg', 400000, 'Kiwi fruit'),
(196, 1, 'kg', 20000, 'Grape fruit'),
(196, 1, 'kg', 120000, 'Beef tenderloin'),
(196, 1, 'kg', 150000, 'Beef ribs'),
(196, 1, 'kg', 260000, 'Lamb Meat'),
(196, 1, 'kg', 120000, 'Pork Cutlet'),
(197, 1, 'kg', 150000, 'Bacon'),
(197, 1, 'kg', 150000, 'Beef ribs'),
(197, 2, 'kg', 520000, 'Lamb Meat'),
(198, 1, 'kg', 30000, 'Dragon fruit'),
(198, 1, 'kg', 90000, 'Durian'),
(198, 1, 'kg', 20000, 'Grape fruit'),
(199, 1, 'kg', 150000, 'Beef ribs'),
(199, 1, 'kg', 120000, 'Beef tenderloin'),
(200, 1, 'kg', 6000, 'Apricot'),
(200, 1, 'kg', 30000, 'Banana'),
(200, 1, 'kg', 5000, 'Cherry'),
(200, 1, 'kg', 20000, 'Grape fruit'),
(200, 1, 'kg', 22000, 'Mango'),
(201, 1, 'kg', 30000, 'Banana'),
(201, 1, 'kg', 5000, 'Cherry'),
(201, 1, 'kg', 120000, 'Pork Cutlet');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `Product`
--

CREATE TABLE `Product` (
  `type` varchar(255) NOT NULL,
  `product_name` varchar(255) NOT NULL,
  `base_price` double NOT NULL DEFAULT 0,
  `sale_price` double NOT NULL DEFAULT 0,
  `unit` varchar(10) NOT NULL,
  `description` varchar(1000) NOT NULL,
  `image` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `Product`
--

INSERT INTO `Product` (`type`, `product_name`, `base_price`, `sale_price`, `unit`, `description`, `image`) VALUES
('Fruit', 'Apricot', 3000, 6000, 'kg', 'Fresh, imported', 'https://media.istockphoto.com/id/172866907/vi/anh/m%C6%A1.jpg?b=1&s=612x612&w=0&k=20&c=xYtYUgUECbjl-VKmEQugI_Dv25dl9YfnC1DsLn9sz8E= '),
('Vegetable', 'Arugula', 5000, 5000, 'kg', 'Arugula is a leafy green vegetable belonging to the Brassicaceae family, which originated in the Mediterranean region. It has a slightly spicy, bitter taste and is often used in dishes from the Mediterranean region. Additionally, arugula is also rich in vitamins and minerals.', 'https://th.bing.com/th/id/OIP.9ArnUWeW_m_EW3rqUEaIfwHaEK?w=311&h=180&c=7&r=0&o=5&dpr=2&pid=1.7'),
('Meat', 'Bacon', 80000, 150000, 'kg', 'Bacon is processed hygienically, suitable for grilled dishes, braised...', 'https://images.pexels.com/photos/1927377/pexels-photo-1927377.jpeg?auto=compress&cs=tinysrgb&w=600 '),
('Fruit', 'Banana', 10000, 30000, 'kg', 'Bananas are a popular fruit that are known for their sweet taste and high nutrient content. They are native to tropical regions of Southeast Asia, but are now grown in many countries around the world. Bananas are a good source of carbohydrates, fiber, and essential vitamins and minerals such as vitamin C, vitamin B6, and potassium. They are also low in fat and calories, making them a healthy snack option. Bananas can be eaten raw or cooked, and are often used in baking and smoothie recipes. They are also a common ingredient in many traditional dishes in countries where they are grown. Bananas are known for their distinctive shape and bright yellow color when ripe, but there are also many other varieties that come in different sizes and colors, such as red and green.', 'https://images.pexels.com/photos/1093038/pexels-photo-1093038.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=2'),
('Fish', 'Basa fish fillet', 50000, 90000, 'kg', 'Basa, also known as Pangasius bocourti or Pangasius hypophthalmus, is a type of freshwater fish that is commonly found in Southeast Asia, specifically in the Mekong and Chao Phraya river basins. Basa is a popular fish for consumption because of its mild, white flesh and versatility in cooking. It can be prepared in various ways such as grilling, frying, baking, or poaching. Basa is also a good source of protein, omega-3 fatty acids, and other essential nutrients. However, there are concerns about the farming practices used to produce basa, as some farms have been accused of using antibiotics and other chemicals.', 'https://media.istockphoto.com/id/682996710/vi/anh/phi-l%C3%AA-c%C3%A1-r%C3%B4-phi-s%E1%BB%91ng-v%E1%BB%9Bi-gia-v%E1%BB%8B.jpg?s=612x612&w=0&k=20&c=urYBvTyaHVJV_lzRGH2UoqVz8I18ei54eYo3ZrOfgCY='),
('Rice', 'Basmati Rice', 10000, 14000, 'kg', 'A fragrant, long-grain rice known for its distinct aroma and delicate flavor. It is commonly used in Indian and Middle Eastern cuisine.', 'https://th.bing.com/th/id/OIP.9v_rhPgejWYckd1PU6CMdAHaHa?w=180&h=180&c=7&r=0&o=5&dpr=2&pid=1.7'),
('Meat', 'Beef ribs', 95000, 150000, 'kg', 'Premium beef ribs imported from the US', 'https://images.pexels.com/photos/410648/pexels-photo-410648.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1'),
('Meat', 'Beef tenderloin', 80000, 120000, 'kg', 'Top quality guaranteed beef tenderloin', 'https://media.istockphoto.com/id/657781874/vi/anh/b%C3%ADt-t%E1%BA%BFt-th%E1%BB%8Bt-b%C3%B2-c%E1%BA%A9m-th%E1%BA%A1ch-tr%C3%AAn-b%E1%BA%A3ng-v%E1%BB%9Bi-h%C6%B0%C6%A1ng-th%E1%BA%A3o-gia-v%E1%BB%8B-v%C3%A0-dao-r%E1%BB%B1a.jpg?s=1024x1024&w=is&k=20&c=EA9G-5ZoH6XPGiYkp5FcQOZa7gJJfgmSpxMn5ionjv8='),
('Vegetable', 'Broccoli', 7000, 12000, 'kg', 'Cauliflower is shipped the same day from Da Lat, clean ingredients', 'https://images.pexels.com/photos/7676914/pexels-photo-7676914.jpeg?auto=compress&cs=tinysrgb&w=600'),
('Rice', 'Brown rice', 8000, 13000, 'kg', 'Whole grain rice that retains the bran and germ layers, offering higher nutritional value compared to white rice. It has a nutty flavor and chewy texture.', 'https://th.bing.com/th/id/OIP.EEUcLhp30fz5XWbQ12HFcAHaEL?w=308&h=180&c=7&r=0&o=5&dpr=2&pid=1.7'),
('Vegetable', 'Cabbage', 14000, 14000, 'kg', 'Cabbage is a leafy green vegetable that is widely used in many cuisines around the world. It has a round or oval shape with tightly packed leaves that can range in color from light green to purple. Cabbage is low in calories and high in nutrients, including vitamin C, vitamin K, and fiber. It is also a good source of antioxidants and phytonutrients, which may have potential health benefits such as reducing inflammation and supporting healthy digestion. Cabbage can be eaten raw or cooked, and is commonly used in salads, coleslaw, soups, stews, and as a side dish. It can also be fermented to make sauerkraut or kimchi, which adds a tangy flavor and extends its shelf life. In addition to its culinary uses, cabbage is also used in traditional medicine for its potential health benefits, such as supporting liver health and reducing the risk of certain cancers.', 'https://th.bing.com/th/id/OIP.1SMG146_pQkFiW3DmZtwmwHaEL?pid=ImgDet&rs=1'),
('Vegetable', 'Carrot', 13000, 13000, 'kg', 'Carrot is a root vegetable that is widely used in many cuisines around the world. It has a crisp texture and a sweet, earthy flavor. Carrot is low in calories and high in nutrients, including beta-carotene, vitamin K, potassium, and fiber. It is also a good source of antioxidants, which may have potential health benefits such as reducing inflammation and supporting healthy skin. Carrots can be eaten raw or cooked, and are commonly used in salads, soups, stews, and as a side dish. They can also be juiced, which is a popular way to consume them for their nutritional benefits. In addition to their culinary uses, carrots are also used in traditional medicine and skincare products, due to their high antioxidant content.', 'https://images.pexels.com/photos/2280550/pexels-photo-2280550.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=2'),
('Fish', 'Catfish', 7000, 3000, 'kg', 'Fatty freshwater catfish, suitable for fried and grilled dishes', 'https://media.istockphoto.com/id/483864868/vi/anh/c%C3%A1-da-tr%C6%A1n-trong-ao.jpg?s=612x612&w=0&k=20&c=KPHW03qWmj97vNDhMdVTUnWOVS_8QJOZSTfDf8X-ZKQ='),
('Fruit', 'Cherry', 60000, 5000, 'kg', 'cherry imported from the US, succulent, small seeds', 'https://images.pexels.com/photos/35629/bing-cherries-ripe-red-fruit.jpg?auto=compress&cs=tinysrgb&w=600 '),
('Fish', 'Cobia fish', 5000, 7000, 'kg', 'Nutritious, fatty cobia caught from the East Sea', 'https://media.istockphoto.com/id/653957160/vi/anh/c%C3%A1.jpg?s=612x612&w=0&k=20&c=R77iI9slJvnv-QKx187EZ6BGBxMxSOkYpusr5OqVDls='),
('Fruit', 'Coconut', 12000, 12000, 'piece', 'Coconut is a tropical fruit that is widely used in many cuisines around the world. It has a hard, brown outer shell and a white, fleshy interior that is rich in nutrients and flavor. Coconut is a good source of fiber, vitamins, and minerals, including potassium, magnesium, and manganese. It is also high in healthy fats, particularly medium-chain triglycerides (MCTs), which may have potential health benefits such as supporting weight loss and improving brain function. Coconut can be eaten raw, or used in a variety of ways in cooking and baking, such as grated or shredded to add texture to dishes, as a flavoring agent in curries and sauces, or as an ingredient in desserts and baked goods. Coconut milk and coconut oil are also popular ingredients in many dishes, particularly in Southeast Asian cuisine. In addition to its culinary uses, coconut has a range of non-food uses, including in skincare products and as a natural alternative to traditional cleaning products.', 'https://images.pexels.com/photos/1424457/pexels-photo-1424457.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=2'),
('Fish', 'Cod fish fillet', 30000, 45000, 'kg', 'Premium cod imported from Europe with modern, high-quality processing technology', 'https://media.istockphoto.com/id/1418956641/vi/anh/phi-l%C3%AA-c%C3%A1-tr%C3%AAn-b%E1%BA%A3ng-g%E1%BB%97-v%E1%BB%9Bi-nguy%C3%AAn-li%E1%BB%87u-n%E1%BA%A5u-%C4%83n-phi-l%C3%AA-c%C3%A1-tra-s%E1%BB%91ng-t%C6%B0%C6%A1i-v%E1%BB%9Bi-th%E1%BA%A3o-m%E1%BB%99c-v%C3%A0-gia-v%E1%BB%8B.jpg?s=612x612&w=0&k=20&c=E8BOGOrdnjhPP8INiQW-inwnhI8gEIl6kyybsN6a_Xk='),
('Vegetable', 'Cucumber', 8000, 10000, 'kg', 'Cucumber is a type of vegetable that is widely used in many cuisines around the world. It has a long, cylindrical shape with a dark green skin and a light green or white flesh inside. Cucumber is low in calories and high in water content, making it a refreshing addition to salads or a healthy snack option. It is also a good source of vitamins and minerals, including vitamin K, potassium, and magnesium. Cucumber can be eaten raw, sliced, or diced and added to salads, sandwiches, or as a dip for vegetables or crackers. It can also be pickled or fermented, which adds a tangy flavor and extends its shelf life. Cucumber is often used in beauty treatments as well, due to its hydrating and anti-inflammatory properties.', 'https://images.pexels.com/photos/2329440/pexels-photo-2329440.jpeg?auto=compress&cs=tinysrgb&w=1600'),
('Fruit', 'Dragon fruit', 25000, 30000, 'kg', 'Binh Thuan white dragon fruit, cultivated with clean technology', 'https://images.pexels.com/photos/5620865/pexels-photo-5620865.jpeg?auto=compress&cs=tinysrgb&w=600 '),
('Fruit', 'Durian', 50000, 90000, 'kg', 'Durian is a tropical fruit that is native to Southeast Asia. It has a large, spiky exterior and a creamy, custard-like interior with a strong, distinctive odor that has been described as both sweet and pungent. Durian is a good source of nutrients such as dietary fiber, vitamin C, and potassium. It is also high in healthy fats, which may have potential health benefits such as improving cholesterol levels and supporting brain function. Durian can be eaten raw, or used in a variety of ways in cooking and baking, such as in smoothies, desserts, or as a flavoring agent in curries and sauces. It is a popular fruit in many Southeast Asian countries, where it is often referred to as the ', '../pictures/Durian.jpg'),
('Vegetable', 'Eggplant', 12000, 12000, 'kg', 'Eggplant, also known as aubergine, is a type of vegetable that is widely used in many cuisines around the world. It has a distinctive shape, with a deep purple or black, glossy skin and a soft, spongy flesh inside. Eggplant is a good source of fiber, vitamins, and minerals such as potassium and manganese. It is also low in calories, making it a great addition to a healthy diet. Eggplant can be prepared in a variety of ways, including grilling, baking, frying, and roasting. It is commonly used in dishes such as ratatouille, moussaka, and baba ghanoush. When cooking eggplant, it is important to remove any bitter compounds by salting it and allowing it to sit for a period of time before rinsing and cooking. Eggplant can also be stuffed or used as a meat substitute in vegetarian dishes, due to its meaty texture.', 'https://images.pexels.com/photos/7195275/pexels-photo-7195275.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=2'),
('Rice', 'Fragrant rice', 9000, 14000, 'kg', ' Fragrant rice, such as Basmati or Jasmine rice, is renowned for its alluring aroma that enhances the dining experience. The grains are long and slender, and when cooked, release a delightful fragrance reminiscent of flowers or popcorn. This type of rice is commonly used in various cuisines, adding a distinct and pleasing scent to dishes like biryanis, pilafs, curries, and stir-fries', 'https://th.bing.com/th/id/OIP.xFHSVs7jqrZ7HRJu_ZHTxgHaHO?w=185&h=181&c=7&r=0&o=5&dpr=2&pid=1.7'),
('Fruit', 'Grape fruit', 13000, 20000, 'kg', 'Graph fruit is rich in vitamin C and other antioxidants, and is believed to have various health benefits, such as boosting the immune system, improving digestion, and reducing inflammation. It is a popular fruit among locals and visitors alike, and is a must-try for anyone who wants to experience the unique flavors of Southeast Asia.', 'https://th.bing.com/th/id/OIP.7-3bzQZsn6uQH9Ugz3geFwHaEK?pid=ImgDet&rs=1'),
('Fish', 'Herring', 3000, 4000, 'kg', 'Herring - Phu Quoc specialty with the name famous salad', 'https://media.istockphoto.com/id/1253824866/vi/anh/%C4%91%C3%A1nh-b%E1%BA%AFt-c%C3%A1-tr%C3%ADch-kh%E1%BB%95ng-l%E1%BB%93-tr%C3%AAn-thuy%E1%BB%81n-%E1%BB%9F-bi%E1%BB%83n-b%E1%BA%AFc.jpg?s=612x612&w=0&k=20&c=ah1El8qvdnuoE2f77h6BxptSjL6zN920Iz8nRdgbws0='),
('Fruit', 'Jackfruit', 70000, 100000, 'kg', 'Sweet, crunchy, low fiber jackfruit', 'https://media.istockphoto.com/id/674349248/vi/anh/m%C3%ADt-t%C6%B0%C6%A1i-h%E1%BB%AFu-c%C6%A1-t%E1%BB%B1-l%C3%A0m.jpg?s=612x612&w=0&k=20&c=rkSZQkldo9xhSRXJf0q3EO5mKXtht7vBijBOZC7XiVY='),
('Rice', 'Jasmine Rice', 11000, 17000, 'kg', ' A fragrant, medium-grain rice with a subtle floral aroma. It is popular in Southeast Asian dishes, particularly Thai cuisine.', 'https://th.bing.com/th/id/OIP.ZsdO-HHNKepNe_aqKd_eCgHaE8?w=268&h=180&c=7&r=0&o=5&dpr=2&pid=1.7'),
('Vegetable', 'Kale', 6000, 13500, 'kg', 'Kale is a leafy green vegetable belonging to the Brassica family, originating from the Mediterranean and Europe. It has a bitter taste and can be eaten raw or cooked. Kale is an extremely nutritious vegetable, containing high levels of antioxidants, vitamins, and minerals essential for good health.', 'https://th.bing.com/th/id/OIP.jEOjzn7DEYJF3V0lGS0NWQHaE8?w=261&h=180&c=7&r=0&o=5&dpr=2&pid=1.7'),
('Fruit', 'Kiwi fruit', 150000, 200000, 'kg', 'Kiwi is sweet, not sour, shipped from Da Lat', 'https://media.istockphoto.com/id/537403487/vi/anh/kiwi.jpg?s=612x612&w=0&k=20&c=5bHjWeIr9sEn1WRaHsX_a5vZHGzjMP3F-eTVNdc58zA= '),
('Meat', 'Lamb Meat', 200000, 260000, 'kg', 'Lamb meat comes from young sheep. It has a tender texture and a distinctive flavor. It is often used in dishes like stews, kebabs, and roasts, and is popular in Mediterranean and Middle Eastern cuisines', 'https://th.bing.com/th/id/OIP.AubAHsmf5QjZSSOSYU9-AQHaHa?w=192&h=192&c=7&r=0&o=5&dpr=2&pid=1.7'),
('Fruit', 'Lemon', 10000, 12000, 'kg', 'Succulent yellow soup, imported from the US', 'https://images.pexels.com/photos/1021756/pexels-photo-1021756.jpeg?auto=compress&cs=tinysrgb&w=600'),
('Fish', 'Mackerel', 1000, 5000, 'kg', 'Mackerel is caught fresh, shipped within the day to ensure freshness', 'https://media.istockphoto.com/id/155606540/vi/anh/c%C3%A1-thu-tr%C3%AAn-b%C4%83ng.jpg?s=1024x1024&w=is&k=20&c=yl3Hstiufv9PNvcJTjQo0KuRtBxRVtjIZ1kLt0s9zy0='),
('Fruit', 'Mango', 12000, 22000, 'kg', 'Mango is a tropical fruit that is native to South Asia, but is now widely grown in many parts of the world. It has a sweet, juicy flesh with a rich, aromatic flavor and a smooth texture. Mango is a good source of nutrients such as vitamin C, vitamin A, and dietary fiber. It is also high in antioxidants, which may have potential health benefits such as reducing inflammation and supporting immune function. Mango can be eaten raw, or used in a variety of ways in cooking and baking, such as in salads, smoothies, desserts, or as a flavoring agent in sauces and marinades. It is a popular fruit during the summer months, and is often included in tropical fruit salads or paired with savory dishes such as grilled chicken or fish. Mangoes are also used in traditional medicine for their potential health benefits, such as improving digestion and reducing the risk of certain diseases.', '../pictures/mango.jpg'),
('Fruit', 'Mangosteen', 300, 1500, 'kg', 'Mangosteen sweet taste, no chemicals, shipped from Da Lat', 'https://media.istockphoto.com/id/465572969/vi/anh/m%C4%83ng-c%E1%BB%A5t.jpg?s=612x612&w=0&k=20&c=dUT6t7NTQztwFTxAR4FVtmZnfP_VEVmgJdnkOREJa8I='),
('Fruit', 'Orange', 10000, 10000, 'kg', 'Orange abc xyz', '../pictures/orange.jpg'),
('Fruit', 'Papaya', 500, 300, 'kg', 'Delicious papaya, few seeds', 'https://images.pexels.com/photos/4113834/pexels-photo-4113834.jpeg?auto=compress&cs=tinysrgb&w=600'),
('Meat', 'Pork Cutlet', 80000, 120000, 'kg', 'Pork cutlet, also known as pork schnitzel, is a thin, boneless piece of pork that has been tenderized and coated in breadcrumbs before being fried or baked. It is a popular dish in many countries, including Germany, Austria, and Japan. Pork cutlet can be made from different cuts of pork, such as the loin or the shoulder, and can be seasoned with various herbs and spices. It is often served with a side of vegetables or a salad. Pork cutlet is a good source of protein and essential nutrients such as iron, zinc, and vitamin B12. However, it is important to be mindful of the cooking method and portion size to keep the dish healthy', 'https://media.istockphoto.com/id/911808978/vi/anh/th%E1%BB%8Bt-l%E1%BB%A3n-v%E1%BB%9Bi-s%C6%B0%E1%BB%9Dn-tenderloin-entrecote-th%E1%BB%8Bt-t%C6%B0%C6%A1i-v%C3%A0-s%E1%BB%91ng-th%E1%BB%B1c-ph%E1%BA%A9m-h%E1%BB%AFu-c%C6%A1-th%E1%BB%8Bt-v%E1%BB%9Bi-gia-v%E1%BB%8B-ti%C3%AAu.jpg?s=612x612&w=0&k=20&c=R1jqJbqwMYese6uzIZjyMnpB84q4BHuHc5Qzr9Nx7ik= '),
('Vegetable', 'Pumpkin', 4000, 10000, 'kg', 'High quality with organic vegetable growing technology', 'https://images.pexels.com/photos/5422857/pexels-photo-5422857.jpeg?auto=compress&cs=tinysrgb&w=600'),
('Vegetable', 'Purple Broccoli', 7000, 13000, 'kg', 'Broccoli makes the dish more colorful and attractive', 'https://images.pexels.com/photos/7457476/pexels-photo-7457476.jpeg?auto=compress&cs=tinysrgb&w=600'),
('Fruit', 'Rambutan', 50000, 60000, 'kg', 'Dong Nai rambutan, same day shipping, selected with high standards', 'https://media.istockphoto.com/id/152160873/vi/anh/ch%C3%B4m-ch%C3%B4m.jpg?s=1024x1024&w=is&k=20&c=2Z7QJY7U4D_tmkqUZS3tGGRJjNhrpKCPxsgK7ya9stY= '),
('Vegetable', 'Salad', 12000, 15000, 'kg', 'Lettuce, also known as salad greens or leafy greens, is a type of vegetable that is commonly eaten raw in salads or used as a topping for sandwiches and burgers. There are many different varieties of lettuce, including romaine, iceberg, arugula, and butterhead. Lettuce is a good source of vitamins A and C, as well as potassium and fiber. It is low in calories and fat, making it a healthy addition to meals. Lettuce can also be cooked and used in a variety of dishes, such as soups, stir-fries, and wraps.', 'https://images.pexels.com/photos/2893639/pexels-photo-2893639.jpeg?auto=compress&cs=tinysrgb&w=1600'),
('Fish', 'Salmon', 80000, 130000, 'kg', 'Imported salmon with five-star quality from Norway', 'https://images.pexels.com/photos/6149078/pexels-photo-6149078.jpeg?auto=compress&cs=tinysrgb&w=600'),
('Vegetable', 'Spinach', 10000, 10000, 'kg', 'Spinach is a leafy green vegetable that is rich in nutrients and widely used in many cuisines around the world. It has a tender, dark green leaves and a slightly bitter, earthy flavor. Spinach is low in calories and high in vitamins and minerals, including vitamin K, vitamin A, iron, and calcium. It is also a good source of antioxidants and dietary fiber. Spinach can be eaten raw, in salads or sandwiches, or cooked in a variety of ways, such as steaming, sautéing, or boiling. It is a versatile ingredient that can be used in a wide range of dishes, including soups, stews, curries, and pasta dishes. Spinach is also used as a filling in savory pastries and pies, such as spanakopita. It is an excellent addition to a healthy diet and may offer numerous health benefits, such as reducing inflammation, improving heart health, and supporting bone health.', 'https://images.pexels.com/photos/6824475/pexels-photo-6824475.jpeg?auto=compress&cs=tinysrgb&w=1600'),
('Fruit', 'Starfruit', 7000, 300, 'kg', 'Guaranteed freshness and succulent', 'https://media.istockphoto.com/id/1266304547/vi/anh/tr%C3%A1i-t%C3%A1o-t%C6%B0%C6%A1i-sao-t%C6%B0%C6%A1i-t%E1%BA%A1i-ch%E1%BB%A3.jpg?s=612x612&w=0&k=20&c=rFT0VAGrOgV7N4rH_oh4P1R6rFbMq_0MpvJs9TlFj5E='),
('Vegetable', 'Straw mushrooms', 6000, 12000, 'kg', 'Straw mushrooms, also known as Volvariella volvacea, are a type of edible mushroom that are commonly found in Southeast Asia. They have a delicate, slightly nutty flavor and a tender texture. Straw mushrooms have a unique appearance with a small, round cap that ranges in color from creamy white to light brown, and a long, slender stem that has a distinctive volva or cup-shaped structure at the base. They are used in a variety of dishes, including soups, stir-fries, curries, and salads. Straw mushrooms are a good source of protein, fiber, and various vitamins and minerals. They are also low in calories and fat, making them a healthy addition to many recipes.', 'https://images.pexels.com/photos/14571142/pexels-photo-14571142.jpeg?auto=compress&cs=tinysrgb&w=600'),
('Fruit', 'Strawberry', 8000, 3000, 'kg', 'Strawberries grown with clean technology, shipped within the day', 'https://images.pexels.com/photos/429807/pexels-photo-429807.jpeg?auto=compress&cs=tinysrgb&w=600 '),
('Fruit', 'Tangerine', 15000, 30000, 'kg', 'Tangerine is a type of citrus fruit that is similar to mandarins and oranges. It has a thin, easy-to-peel skin that is usually bright orange in color, and a sweet, juicy interior with a fragrant aroma. Tangerines are a good source of vitamin C, which is an important antioxidant that helps support immune function and collagen production. They also contain other important nutrients, such as vitamin A, potassium, and folate. Tangerines can be eaten raw, or used in a variety of ways in cooking and baking, such as in salads, desserts, or as a flavoring agent in sauces and marinades. They are a popular fruit during the winter months, and are often included in holiday fruit baskets. Tangerines are also used in traditional medicine, particularly in Chinese medicine, for their potential health benefits such as improving digestion and reducing inflammation.', '../pictures/tangerine.jpg'),
('Fish', 'Tuna', 4000, 7000, 'kg', 'Fresh tuna, suitable for stews, soups,...', 'https://th.bing.com/th/id/OIP.7w3qRtAabITj_I8qgAF-LwHaDc?w=349&h=162&c=7&r=0&o=5&dpr=2&pid=1.7'),
('Fruit', 'Watermelon', 4000, 6000, 'kg', 'Watermelon is a juicy and refreshing fruit that is native to Africa but is now widely cultivated in many countries around the world. It is a large, round fruit with a thick, green rind that is often striped or spotted with lighter and darker shades of green.  Inside, the flesh of the watermelon is juicy and bright pink or red in color, although some varieties may have yellow or orange flesh. It is usually eaten raw and is a popular summertime treat, often served in slices or cut into cubes.  Watermelon is not only delicious but also packed with nutrients. It is an excellent source of vitamin C and contains other important vitamins and minerals such as vitamin A, potassium, and lycopene, which is an antioxidant that may help protect against certain types of cancer and heart disease.', '../pictures/watermelon.jpg');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `Type`
--

CREATE TABLE `Type` (
  `type` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `Type`
--

INSERT INTO `Type` (`type`) VALUES
('Fish'),
('Fruit'),
('Meat'),
('Rice'),
('Vegetable');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `User`
--

CREATE TABLE `User` (
  `user_name` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` varchar(5) NOT NULL DEFAULT 'user',
  `customer_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `User`
--

INSERT INTO `User` (`user_name`, `password`, `role`, `customer_id`) VALUES
('ADMIN', '$2y$10$BycA03kj.KS3rW9wojOUdu77.RUrvxWYa2GaM4p9OKfSDnaNPmb0G', 'admin', 1),
('banhvanphe', '$2y$10$oM4gCdmWdZFhhf8VaCzd9OOFgyhE2zN2/My606DcMVV5xI1JI0Mna', 'user', 7),
('hoangnguyen01', '$2y$10$8pX2gBDYP6O.wCYi8cZSye8cH3alJeTf5DuCeQlhgiSqPdbRu1V2u', 'user', 10),
('nguyendeptrai', '$2y$10$kVfrEXseZ4igdvRDeBZukOukPyaEFGxaxLlDkBGnASaphLHQSmcM.', 'user', 5);

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `Comment`
--
ALTER TABLE `Comment`
  ADD PRIMARY KEY (`comment_id`),
  ADD KEY `product_name` (`product_name`),
  ADD KEY `user_name` (`user_name`);

--
-- Chỉ mục cho bảng `Customer`
--
ALTER TABLE `Customer`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `Date_Report`
--
ALTER TABLE `Date_Report`
  ADD PRIMARY KEY (`update_date`);

--
-- Chỉ mục cho bảng `Discount`
--
ALTER TABLE `Discount`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `Notifycations`
--
ALTER TABLE `Notifycations`
  ADD KEY `user_name` (`user_name`);

--
-- Chỉ mục cho bảng `Order`
--
ALTER TABLE `Order`
  ADD PRIMARY KEY (`id`),
  ADD KEY `customer_id` (`customer_id`);

--
-- Chỉ mục cho bảng `Order_Detail`
--
ALTER TABLE `Order_Detail`
  ADD KEY `product_foreign_key` (`product_name`),
  ADD KEY `order_foreign_key` (`order_id`);

--
-- Chỉ mục cho bảng `Product`
--
ALTER TABLE `Product`
  ADD PRIMARY KEY (`product_name`),
  ADD KEY `product_ibfk_1` (`type`);

--
-- Chỉ mục cho bảng `Type`
--
ALTER TABLE `Type`
  ADD PRIMARY KEY (`type`);

--
-- Chỉ mục cho bảng `User`
--
ALTER TABLE `User`
  ADD PRIMARY KEY (`user_name`),
  ADD KEY `customer_id` (`customer_id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `Comment`
--
ALTER TABLE `Comment`
  MODIFY `comment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT cho bảng `Customer`
--
ALTER TABLE `Customer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT cho bảng `Discount`
--
ALTER TABLE `Discount`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT cho bảng `Order`
--
ALTER TABLE `Order`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=202;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `Comment`
--
ALTER TABLE `Comment`
  ADD CONSTRAINT `comment_ibfk_1` FOREIGN KEY (`product_name`) REFERENCES `Product` (`product_name`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `comment_ibfk_2` FOREIGN KEY (`user_name`) REFERENCES `User` (`user_name`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `Notifycations`
--
ALTER TABLE `Notifycations`
  ADD CONSTRAINT `notifycations_ibfk_1` FOREIGN KEY (`user_name`) REFERENCES `User` (`user_name`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `Order`
--
ALTER TABLE `Order`
  ADD CONSTRAINT `order_ibfk_1` FOREIGN KEY (`customer_id`) REFERENCES `Customer` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `Order_Detail`
--
ALTER TABLE `Order_Detail`
  ADD CONSTRAINT `order_foreign_key` FOREIGN KEY (`order_id`) REFERENCES `Order` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `product_foreign_key` FOREIGN KEY (`product_name`) REFERENCES `Product` (`product_name`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `Product`
--
ALTER TABLE `Product`
  ADD CONSTRAINT `product_ibfk_1` FOREIGN KEY (`type`) REFERENCES `Type` (`type`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `User`
--
ALTER TABLE `User`
  ADD CONSTRAINT `user_ibfk_1` FOREIGN KEY (`customer_id`) REFERENCES `Customer` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

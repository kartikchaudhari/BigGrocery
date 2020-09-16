--
-- Database: `biggrocer`
--
CREATE DATABASE IF NOT EXISTS `biggrocer` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `biggrocer`;

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `admin_id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(200) NOT NULL,
  `email` varchar(100) NOT NULL,
  `phone` varchar(10) NOT NULL,
  `login_token` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`admin_id`, `username`, `password`, `email`, `phone`, `login_token`) VALUES
(1, 'kartik_1003', '0208a2e72da71f7d17d6d20080990ad0', 'kartikchaudhari456@gmail.com', '8153976277', '');

-- --------------------------------------------------------

--
-- Table structure for table `ad_banner`
--

CREATE TABLE `ad_banner` (
  `banner_id` int(11) NOT NULL,
  `name` varchar(64) NOT NULL,
  `status` tinyint(1) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `ad_banner`
--

INSERT INTO `ad_banner` (`banner_id`, `name`, `status`) VALUES
(1, 'TestBanner', 1),
(2, 'TestBanner', 0),
(3, 'TestBanner', 0),
(4, 'TestBanner', 0);

-- --------------------------------------------------------

--
-- Table structure for table `ad_banner_image`
--

CREATE TABLE `ad_banner_image` (
  `banner_img_id` int(11) NOT NULL,
  `banner_id` int(11) NOT NULL,
  `banner_title` varchar(200) NOT NULL,
  `banner_image` varchar(200) NOT NULL,
  `banner_ad_url` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ad_banner_image`
--

INSERT INTO `ad_banner_image` (`banner_img_id`, `banner_id`, `banner_title`, `banner_image`, `banner_ad_url`) VALUES
(1, 1, 'SampleTest', 'assets/images/banners/1904170_wheat_t2_Wheatbharti_460.jpg', ''),
(2, 1, 'Sample', 'assets/images/banners/1904214_water-bottle_460.jpg', ''),
(3, 1, '', 'assets/images/banners/1904215_cookware-steel_t1_460.jpg', '#'),
(4, 1, 'Sample', 'assets/images/banners/1904215_cookware-steel_t1_460.jpg', '#'),
(5, 1, 'Sample', 'assets/images/banners/1904021_summer-sale_t1_460.jpg', '#'),
(6, 1, 'Sample', 'assets/images/banners/1904222_cleaners-tissue_460_4th.jpg', '#'),
(7, 1, 'Sample', 'assets/images/banners/1904216_cereals-nutrition_460.jpg', '#'),
(8, 1, 'Sample', 'assets/images/banners/1904302_STAPLES_t2_ahmedabad_460.jpg', '#');

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `cart_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `cart_conetents` text NOT NULL,
  `total_qty` int(11) NOT NULL,
  `total_price` int(11) NOT NULL,
  `date_add` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `user_ip` varchar(40) DEFAULT NULL,
  `token` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cart`
--


--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `cat_id` int(11) NOT NULL,
  `cat_name` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`cat_id`, `cat_name`) VALUES
(1, 'Kitchen'),
(2, 'Personal Care'),
(3, 'Household');

-- --------------------------------------------------------

--
-- Table structure for table `offers`
--

CREATE TABLE `offers` (
  `offer_id` int(11) NOT NULL,
  `offer_name` text NOT NULL,
  `product_id` int(11) NOT NULL,
  `offer_price` int(11) NOT NULL,
  `start_date` date NOT NULL DEFAULT '0000-00-00',
  `end_date` date NOT NULL DEFAULT '0000-00-00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `order_id` int(11) NOT NULL,
  `cart_id` int(11) NOT NULL,
  `total_amount` int(11) NOT NULL,
  `order_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `delivery_address` text NOT NULL,
  `payment_status` varchar(20) DEFAULT NULL,
  `order_status` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `orders`
--


-- --------------------------------------------------------

--
-- Table structure for table `payments`
--

CREATE TABLE `payments` (
  `payment_id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `reference_id` text,
  `payment_mode` varchar(2) DEFAULT NULL,
  `gateway` varchar(20) DEFAULT NULL,
  `txn_id` text NOT NULL,
  `status` varchar(10) NOT NULL,
  `amount` int(11) NOT NULL,
  `payment_date_time` datetime DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;



--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `product_id` int(11) NOT NULL,
  `cat_id` int(11) NOT NULL,
  `sub_cat_id` int(11) NOT NULL,
  `product_name` varchar(300) NOT NULL,
  `company_name` varchar(200) NOT NULL,
  `product_image` varchar(500) NOT NULL,
  `product_image_full` varchar(300) NOT NULL,
  `product_weight` varchar(10) NOT NULL,
  `veg_nonveg` tinyint(1) NOT NULL,
  `product_desc` text NOT NULL,
  `product_discount` int(11) NOT NULL,
  `product_price` int(11) NOT NULL,
  `old_price` int(11) NOT NULL,
  `has_offers` tinyint(1) NOT NULL,
  `product_status` int(11) NOT NULL,
  `product_stock` int(11) NOT NULL,
  `product_add_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`product_id`, `cat_id`, `sub_cat_id`, `product_name`, `company_name`, `product_image`, `product_image_full`, `product_weight`, `veg_nonveg`, `product_desc`, `product_discount`, `product_price`, `old_price`, `has_offers`, `product_status`, `product_stock`, `product_add_time`) VALUES
(1, 1, 1, 'CocaCola Bottle', 'CocaCola Company', 'product_images/thumb/cocacola_PNG21.png', 'product_images/full/sprite.jpg', '1.5 ml', 0, '1. Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod\r\n tempor incididunt ut labore et dolore magna aliqua. \r\n\r\n2. Ut enim ad minim veniam,\r\n quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo\r\n consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse\r\n\r\n3.cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non\r\n proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 16, 63, 93, 1, 1, 25, '2019-12-05 00:52:01'),
(2, 1, 1, 'Sprite', 'Pepsi India', 'product_images/thumb/sprite.jpg', 'product_images/full/sprite.jpg', '1.75 ltr', 0, 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod\r\n		tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,\r\n		quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo\r\n		consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse\r\n		cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non\r\n		proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 16, 63, 70, 1, 1, 29, '2019-03-12 09:54:11'),
(3, 1, 1, 'Limca Soft Drink-Lemon Flavour', 'Coca Cola ', 'product_images/thumb/limca.jpg', 'product_images/full/sprite.jpg', '750 ml', 0, '<h4>About</h4><hr>\r\n<p>\r\nFeeling down? Limcas lemony taste and fizz will get you going again. Limca is a cloudy lemon drink, combining sharp fizz and a lemony bite that has been quenching thirst since 1971. The ultimate thirst quencher and a provider of freshness, the Lime n Lemoni Limca recharges you with every sip. Thus, do not let thirst take you down, grab a Limca and Phir Ho Ja Shuru! Limca also publishes the Limca Book of Records as a reverence for those who know the art of defeating and winning. You can check out the latest Limca Book of Records at www.limcabookofrecords.in</p>\r\n<br>\r\n<br>\r\n\r\n<h4>Ingredients</h4><hr><p>Carbonated Water, Sugar, Acidity Regulators (330, 331), Stabilizers (414, 471), Preservative (211). Contains Permitted Class II Preservative & Added Flavours (Natural, Nature Identical, Artificial Flavouring Substances). Contains no Fruit.</p><br><br><h4>Other Product Info</h4><hr>\r\n<p>\r\nEAN Code: 251012\r\nManufactured by: HINDUSTAN COCA-COLA BEVERAGES PVT. LTD. , SURVEY NO. 284-P, POST KUDUS, TALUKA WADA, DISTRICT PALGHAR- 421 312, MAHARASHTRA\r\nBest before 02-12-2018\r\nFor Queries/Feedback/Complaints, Contact our Customer Care Executive at: Phone: 1860 123 1000 | Address: Supermarket Grocery Supplies Pvt Ltd. No7, Service Road, Domlur 100 Feet Road, Indiranagar, Bangalore 560071. | Email: customerservice@bigbasket.com</p>', 0, 40, 50, 0, 1, 55, '2018-09-03 21:08:43'),
(4, 1, 1, 'Fanta Soft Drink - Orange Flavour', 'COCA-COLA BEVERAGES', 'product_images/thumb/fanta.jpg', 'product_images/full/fanta.jpg', '1.25 ltr', 0, '<h4>About</h4><hr>\r\n<p>\r\nFun, vibrant and bubbly - that is what defines Fanta best! Fanta lets you make the most of a moment with the tempting taste and its tingling bubbles. This orange drink entered the Indian market in the year 1993 and is perceived as a youth brand since. Standing for its vibrant color, tempting taste and exciting bubbles, Fanta can uplift feelings and help free your spirit, encouraging you to indulge in and enjoy each moment to the fullest. Grab a bottle now, and enjoy the great Orangey kick in every sip!\r\n</p>\r\n<br><br>\r\n<h4>Ingredients</h4>\r\n<hr>\r\n<p>\r\nCarbonated Water, Sugar. Acodotu Regulator (330), Stabilizers (414, 445) And Permitted Class II Preservative (211).\r\n</p>\r\n<br><br>\r\n<h4>Nutrition Facts Energy:</h4>\r\n<hr>\r\n<p>52 kcal, Carbohydrate: 13g, Sugar:13g, Protein: 0g, Fat: 0g.</p>\r\n<br><br>\r\n<h4>Other Product Info:</h4><hr>\r\n<p>\r\nEAN Code: 265696\r\nManufactured by: HINDUSTAN COCA-COLA BEVERAGES PVT. LTD. , SURVEY NO. 284-P, POST KUDUS, TALUKA WADA, DISTRICT PALGHAR- 421 312, MAHARASHTRA\r\nBest before 18-10-2018\r\nFor Queries/Feedback/Complaints, Contact our Customer Care Executive at: Phone: 1860 123 1000 | Address: Supermarket Grocery Supplies Pvt Ltd. No7, Service Road, Domlur 100 Feet Road, Indiranagar, Bangalore 560071. | Email: customerservice@bigbasket.com</p>', 0, 56, 65, 0, 1, 89, '2018-09-03 21:08:46'),
(6, 1, 1, 'Red Bull Energy Drink, 250 ml Pack of 4', 'Red Bull International Austria', 'product_images/thumb/3e59927040857649be7b1bc024c6e599.jpg', 'product_images/full/fc6b0b13708adc9071bb31128ef772ea.jpg', '250 ml', 0, 'Red Bull Energy Drink is a functional beverage providing wings whenever you need them.', 0, 350, 0, 0, 1, 1000, '2018-10-16 10:43:47'),
(8, 1, 1, 'Kinley Mineral Water, 24x500 ml Multi Pack', 'HINDUSTAN COCA-COLA BEVERAGES PVT. LTD.', 'product_images/thumb/c7f63822eb75c369c2e9f4e68d125772.jpg', 'product_images/full/d7cd89ce89a48dde7d973abed52430e3.jpg', '250 ml', 0, '<p>\r\nWhen you are drinking Kinley Mineral Water, you are assured of water in its purest form, because Kinley from the house of Coca-Cola uses reverse osmosis technology to produce clean and safe drinking water.\r\n</p>', 0, 385, 0, 0, 1, 2000, '2018-10-08 06:33:56'),
(9, 1, 5, 'Kelloggs Chocos, 125 gm', 'Kelloggs India Pvt Ltd', 'product_images/thumb/1b13375a319c9a5042d02ac589314087.jpg', 'product_images/full/aa11ffa21b94a31c6d29f60de3940d24.jpg', '125 g', 0, '<h3>About:</h3>\r\n<hr>\r\n<p>\r\nBring a little magic to your Kids day with the delicious taste of Kelloggs Chocos. Kelloggs Chocos is a Solid and Nourishing food for your kids to get going and it has the protein and fibre of 1 Roti, along with 10 Vitamins and minerals. Kelloggs Chocos is high in calcium, low in fat and naturally cholesterol free. Crafted to make your Kids milk bowl tasty and fun, our chocolaty, crunchy and grain-based cereal makes for a tasty pick-me-up at school or work, as an afternoon bite, or a late-night treat. A travel-ready food, Kelloggs Chocos are an ideal companion for lunchboxes, after-school snacks, and busy, on-the-go moments. Just add milk or enjoy as a crispy treat straight from the box. Yummy Chocolaty cereal with whole grain that your kids will love, with Protein and fibre of 1 Roti. Give your Kids a Solid start to the day with the grain-based yummy chocolaty Kelloggs Chocos. Kelloggs Chocos is a food high in calcium, iron and B-Group Vitamins.No preservatives have been added.\r\n</p><br><br>\r\n<h3>Ingredients:</h3>\r\n<hr>\r\n<p>\r\nWhole Wheat Flour (29%), Wheat Flour, Sugar Cocoa Slides (De-Fatted 5%), (Ins 150D), Vitamins, Minerals, Antioxidant (Ins 320).</p>\r\n<br><br>\r\n<h3>Other Product info:</h3><hr>\r\n<p>EAN Code: 123659\r\nManufactured by: Kelloggs India Pvt Ltd, Plot No. L2 & L3, Taloja MIDC, Dist. Rajgad, Maharashtra - 410208\r\nBest before 28-02-2019\r\nFor Queries/Feedback/Complaints, Contact our Customer Care Executive at: Phone: 1860 123 1000 | Address: Supermarket Grocery Supplies Pvt Ltd. No7, Service Road, Domlur 100 Feet Road, Indiranagar, Bangalore 560071. | Email: customerservice@bigbasket.com</p>\r\n', 0, 55, 0, 0, 1, 200, '2018-10-16 16:39:50'),
(10, 1, 5, 'Kelloggs Special K, 900 gm ', 'Kelloggs India Pvt Ltd', 'product_images/thumb/d0c1140bf63292e34e07b025fabf5d4f.jpg', 'product_images/full/46e24cc7875a13bb14e5f96bed490a17.jpg', '900 g', 0, '<h3>About:</h3><hr>\r\n<p>Kelloggs Special K is a delicious, low fat, ready-to-eat cereal, with the goodness of whole wheat and bran. It is high in B group Vitamins and Vitamin C, and It is a source of protein and fibre. Relish it with skimmed milk or whisked yoghurt (Dahi), along with your favourite fruit is or dry fruit is. Start each day with this tasty breakfast cereal and see if you feel the difference for yourself. Claims are made based on CODEX Guidelines for use of Nutrition and Health claims - CAC/GL 23-1997. Crunchy, lightly sweetened, low-fat breakfast cereal with the goodness of whole wheat and bran in every delicious spoonful, makes this an irresistible breakfast. Start off your day with a balanced, great-tasting breakfast that can put you on the fast track to good nutrition and better, quick and convenient breakfast in just 2-3 minutes overall health. Kelloggs fortified corn flakes offer a low-fat, nutrient-dense, cholesterol-free food that encourages breakfast consumption. No preservatives have been added. You can count on Kellogg for great-tasting, convenient, and affordable choices that meet their nutrition needs.\r\n</p>\r\n<br><br>\r\n<h3>Ingredients:</h3><hr>\r\n<p>Rice (36.15%), Whole wheat(33.24%), Sugar, Wheat Bran (4.74%), Liquid Glucose, Iodized Salt, Malt extract, Vitamins, Minerals and Antioxidant (INS 320)</p><br><br>\r\n<h3>Other product info.</h3>\r\n<hr>\r\n<p>\r\n\r\n</p>', 0, 302, 0, 0, 1, 100, '2018-10-17 02:34:10'),
(11, 1, 5, 'Quaker Oats, 600 gm Pouch', ' Quaker oats Australia pty. Ltd.', 'product_images/thumb/13940aa8fcb3ad0d25fe6afcbef30938.jpg', 'product_images/full/915b44c1ad1af0be1c7e5b3d5319a221.jpg', '600 gm', 0, '<h2>About:</h2><hr>\r\n<p>Start your morning with a wholesome bowl of Quaker Oats- the perfect breakfast porridge for the whole family. Quaker oats is made from 100 % wholegrain oats, which is a natural source of carbohydrates, protein, and dietary fibre. It helps reduce the risk of high blood pressure and cholesterol. It is easy to prepare in just 3 minutes and blends into almost any recipe, enhancing its nutritional value without compromising on taste. About the brand - For over 135 years, Quaker has unlocked the power of oats to help people get the perfect start to each day.Start your morning with a wholesome bowl of Quaker Oats- the perfect breakfast porridge for the whole family. </p><br><br>\r\n<h2>Nutritional Facts:</h2><hr>\r\n<p>\r\n(per 100g): Energy - 407 Kcal, Protein - 11.8 g, Total Fat -9.5 g, Total Carbohydrate - 68.5 g, Total Dietary Fibre - 10 g, Iron - 2.5 mg, Magnesium - 106mg, Sodium - 9.5 mg, Zinc - 2.0 mg</p><br><br>\r\n<h2>How to use ?:</h2>\r\n<hr>\r\n<p>\r\nAdd 1/2 cup of Oats, 1 glass skimmed milk and cook for 2 to 3 minutes on stove/microwave. Add sugar/honey as per your taste. Top it up with your favourite fruits and nuts to make it more delicious and nutritious.</p>\r\n<br><br>\r\n<h2>Other Product Info:</h2><hr>\r\n<p>\r\nEAN Code: 40003275\r\nManufacturer Name & Address: Q1 Quaker oats Australia pty. Ltd., 12 carolyn way, forrestfield western Australia6058. Q2 Unigrain Pty ltd., 28 Howsen Way, Bibra Lake, WA, 6163, Australia. Q3 Al Ghurair Foods LLC , P.O Box 780, Dubai, UAE.\r\nBest before 15-04-2019\r\nFor queries call 1860 123 1000 \r\n</p>', 0, 93, 0, 0, 1, 56, '2018-10-17 04:02:35'),
(12, 1, 5, 'MTR Breakfast Mix - Upma, 170 gm Pouch', ' MTR FOODS PVT LTD.', 'product_images/thumb/e04ed1b773ccd7041746a793ca14fdce.jpg', 'product_images/full/a8eba4f43d1dcb625721dcd5034c4818.jpg', '170 gm', 0, '<h2>About:</h2><hr>\r\n<p>Breakfast is usually a rushed time and when we need a good meal, we make do with whatever we can lay our hands on. But you can now bid goodbye to those days and add some yummy dishes to your breakfast menu, thanks to the MTR range of quick fix breakfast mixes.</p>\r\n<br><br>\r\n<h2>Ingredients:</h2><hr>\r\n<p>The Upma breakfast mix from the house of MTR is a fortified powder that contains 75% semolina, which is the basic grain for upma as well as ginger, sugar, anticaking agent, lemon powder, curry leaves and mustard. It also contains real vegetables and various condiments and spices which add flavour, aroma and texture to the dish.</p>\r\n<br><br>\r\n<h2>How to use ?:</h2><hr>\r\n<p>These quick fix breakfast mixes get ready in a jiffy! All you need to do is take a few scoopfuls and cook it for a few minutes as per the instructions. Use hot water to make this dish. It can be taken with sambhar and chutney for a truly yummy meal!</p>\r\n<br><br>\r\n<h2>Other Product info:</h2><hr>\r\n<p>EAN Code: 265956\r\nManufacturer Name & Address: MTR FOODS PVT LTD, No.1, 2nd &3rd Floor, 100 Feet Inner Ring Road, Ejipura, Bengaluru -560047\r\nBest before 18-04-2019\r\nFor Queries/Feedback/Complaints, Contact our Customer Care Executive at: Phone: 1860 123 1000 | Address: Supermarket Grocery Supplies Pvt Ltd. No7, Service Road, Domlur 100 Feet Road, Indiranagar, Bangalore 560071. | Email: customerservice@bigbasket.com </p>', 0, 33, 0, 0, 1, 56, '2018-10-17 04:48:12'),
(13, 1, 5, 'MTR Breakfast Mix - Dosa, 200 gm Pouch', 'MTR FOODS PVT LTD.', 'product_images/thumb/0c42748ae58e7c9f6a42ae1a9cb65d7b.jpg', 'product_images/full/9e9671477141408de0d5de20aee2ea40.jpg', '200 gm', 0, '<h2>About:</h2><hr>\r\n<p>MTR Dosa Breakfast Mix is another readymade breakfast cereal that saves your time and gives you breakfast with a good taste. Enjoy a healthy breakfast in a less time since MTR Dosa Breakfast Mix is ready for you to serve a pleasant, crispy dosas.</p>\r\n<br><br>\r\n<h2>Ingredients:</h2>\r\n<hr>\r\n<p>\r\nRice Flour (46%), Black Gram, Wheat Cream, Hydrogenated Vegetable Oil, Salt, Sodium Bicarbonate, Citric Acid and Fenugreek Powder.</p>\r\n<br><br>\r\n<h2>How to Use ?:</h2>\r\n<hr>\r\n<p>Mix 1 measure of MTR Instant Dosa Mix with 11/2 measures of Water into a smooth batter. Set aside for 5-minutes. Alternatively batter can be prepared with 1 measure of Water and 1/2 measure of yoghurt.</p>\r\n<br><br>\r\n<h2>Other Product Info:</h2><hr>\r\n<p>EAN Code: 265949\r\nManufacturer Name & Address: MTR FOODS PVT LTD, No.1, 2nd &3rd Floor, 100 Feet Inner Ring Road, Ejipura, Bengaluru -560047\r\nBest before 01-03-2019\r\nFor Queries/Feedback/Complaints, Contact our Customer Care Executive at: Phone: 1860 123 1000 | Address: Supermarket Grocery Supplies Pvt Ltd. No7, Service Road, Domlur 100 Feet Road, Indiranagar, Bangalore 560071. | Email: customerservice@bigbasket.com </p>\r\n\r\n', 0, 60, 0, 0, 1, 7998, '2018-10-17 07:24:20'),
(14, 1, 7, 'Royal Cumin/Jeera Whole, 1 kg ', ' Bangalore SRI Gayatri Trading Company', 'product_images/thumb/31ff7d3f90913e2645018073d3516ec4.jpg', 'product_images/full/7e2a7e3c6e29e35a1f100e856e16b36f.jpg', '1 kg', 0, '<h2>About:</h2><hr>\r\n<p>\r\nJeera Is A Strong Spice And Most People Use It To Add Additional Taste To Their Food. However, This Spice Is Well-Known Not Just For Its Flavor, But Also For The Wellbeing Benefits Of Cumin Seeds. It Is A Familiar Ingredient In Indian Kitchens. Apart From Adding Savor To A Dish, It Has Got Fitness Benefits Too. It Is A Spice Which Offers A Sturdy, Exclusive And Soothing Smell. It Is Used To Offer Flavor To Different Cuisines.</p>\r\n<br><br>\r\n<h2>Other Product info:</h2>\r\n<hr>\r\n<p>\r\nEAN Code: 40030808\r\nManufactured by : Bangalore SRI Gayatri Trading Company #37, 2nd Floor, Raghuvanahalli, Kanakapura Road, Bangalore - 560062 Fssai Lic No11216302000385 | Kolkata MARK COMMODITIES 80 DR SURESH SARKAR ROAD KOLKATA-700014 Fssai Lic No12816019000954 | Chennai M.M Marketing (Chennai) No. 7/1 2nd floor, 1st Main, Off 100ft Road, Domlur 2nd Stage, Bangalore - 560071 Fssai Lic No10015042002228 | Patna M/S ASG VISION B-295, MITRA MONDAL COLONY , SAKET VIHAR , PATNA - 800002 Fssai Lic No10416000000798 | Ahmedabad Saarthi Enterprises , Kapildev Isabgol Industries, Khali Char rasta, Highway road, Siddhpur-384151, Gujrat Fssai Lic NoCC NO-02767-292252 | Mumbai UNISHA ENTERPRISES PVT LTD H-33 APMC Market - I, Phase - IIVashi Turbhe RoadMasala MarketVashiNavi Mumbai Fssai Lic No11517017000043 | Pune UNISHA ENTERPRISES PVT. LTD Unit I :H-33, APMC Market-I, Phase-II, Vashi, Navi Mumbai, Maharashtra, Indi-400705. Fssai Lic No11517017000043 | Pune UNISHA ENTERPRISES PVT. LTD Unit II : G-21, APMC Market-I, Phase-II, Vashi, Navi Mumbai, Maharashtra, India-400705. Fssai Lic No11517017000041 | Delhi STERLING GROCERIES PVT. LTD PLOT NO- 443 ECOTECH III, UK-II, GREATER NOIDA- 201308 Fssai Lic No12716055000185 | Vijayawada-Guntur OMKARESWARA AGENCIES (VJA) , 2/14/190, syamalanagar, 1stline, guntur-5220006 Fssai Lic No10117030000126 |\r\nMarketed by : Supermarket Grocery Supplies Pvt Ltd. No7, Service Road, Domlur 100 Feet Road, Indiranagar, Bangalore 560071\r\nBest before 15-01-2019\r\nFor Queries/Feedback/Complaints, Contact our Customer Care Executive at: Phone: 1860 123 1000 | Address: Supermarket Grocery Supplies Pvt Ltd. No7, Service Road, Domlur 100 Feet Road, Indiranagar, Bangalore 560071. | Email: customerservice@bigbasket.com</p>', 0, 319, 0, 0, 1, 200, '2019-03-02 17:00:15'),
(15, 1, 7, 'Tikhalal Chilli', 'S.NARENDRAKUMAR & Co.', 'product_images/thumb/e8c522fa0b889e747abd37e579440b89.jpg', 'product_images/full/ddb4a2a2cc90836ee1994ff291fb4715.jpg', '200 gm', 0, '<h2>About:</h2><hr>\r\n<p>Everest Tikhalal Chilli Powder is one such seasoning. It provides a fine-ground chilli powder that is a great mix of colour and strong flavor. In Indian cuisine, it is the flavor, tang, color of the spices used that plays a major role in most of the dishes. So make an effort Everest Tikhalal Chilli Powder for a spicy cooking. Chilli powder in this package contains an admixture or not more than 2% of edible groundnut oil.</p>\r\n<br><br>\r\n<h2>Ingredients:</h2><hr>\r\n<p>Chilli Powder.</p>\r\n<br><br>\r\n<h2>Other Product info:</h2>\r\n<hr>\r\n<p>EAN Code: 100004121\r\nManufactured by: S.NARENDRAKUMAR & Co. G.M.Road, Amar Mahal, Chembur (W), Mumbai-400089\r\nBest before 19-04-2019\r\nFor Queries/Feedback/Complaints, Contact our Customer Care Executive at: Phone: 1860 123 1000 | Address: Supermarket Grocery Supplies Pvt Ltd. No7, Service Road, Domlur 100 Feet Road, Indiranagar, Bangalore 560071. | Email: customerservice@bigbasket.com</p>', 0, 56, 0, 0, 1, 1000, '2019-03-02 17:00:01'),
(16, 1, 7, 'Turmeric', ' S.NARENDRAKUMAR & Co', 'product_images/thumb/30efc4c0df276c63942f15c1145328c7.jpg', 'product_images/full/e1fab521d85c5b576dfdbd05a3731b6e.jpg', '500 gm', 0, '<h2>About:</h2><hr>\r\n<p>Haldi is the grand ingredient that makes kings out of all Indian dishes. A staple in India cuisine, this spice can add flavour, aroma and texture to any and every dish. Everest is a brand that is known for its various spices and condiments. Its turmeric powder is a high quality one that can be found in leading stores.</p><br><br>\r\n<h2>Ingredients:</h2><hr>\r\n<p>This yellowy spice is also known as the Indian Saffron. Picked from the finest farm lands, haldi in its purest form is boiled and dried before it is ground to a powder at the hygienic and well established industrial set up of an Everest spice mill. This 500 gram pouch is then vacuum sealed to keep the freshness intact.</p>\r\n<br><br>\r\n<h2>How to use ?:</h2><hr>\r\n<p>While haldi or turmeric powder is used mainly while cooking the seasoning of various Indian dishes like dals, vegetables, and curries, it can also be used to marinate fish. </p>\r\n<br><br>\r\n<h2>Other Product Info:</h2><hr>\r\n<p>EAN Code: 265490\r\nManufactured by: S.NARENDRAKUMAR & Co. G.M.Road, Amar Mahal, Chembur (W), Mumbai-400089\r\nBest before 03-06-2019\r\nFor Queries/Feedback/Complaints, Contact our Customer Care Executive at: Phone: 1860 123 1000 | Address: Supermarket Grocery Supplies Pvt Ltd. No7, Service Road, Domlur 100 Feet Road, Indiranagar, Bangalore 560071. | Email: customerservice@bigbasket.com</p>', 0, 122, 0, 0, 1, 500, '2019-03-02 17:00:04'),
(17, 1, 7, 'Green Coriander', 'S.NARENDRAKUMAR & Co', 'product_images/thumb/5e816bbec939b992a2c8ed608d65e7e4.jpg', 'product_images/full/2b80504f377a43801a4b7a6b6c05fa62.jpg', '200 gm', 0, '<h2>About:</h2>\r\n<hr>\r\n<p>Everest Coriander Powder is vastly used in Indian cuisine. This powder is very much desirable and it also acts as a thickening cause. It presents a humid and gentle flavor to curry dishes and acts as a thickener for gravies.</p><br><br>\r\n<h2>Ingredients:</h2>\r\n<hr>\r\n<p>Dry Coriander Seeds.</p><br><br>\r\n<h2>Other Product Info.:</h2><hr>\r\n<p>EAN Code: 100004183\r\nManufactured by: S.NARENDRAKUMAR & Co. G.M.Road, Amar Mahal, Chembur (W), Mumbai-400089\r\nBest before 19-04-2019\r\nFor Queries/Feedback/Complaints, Contact our Customer Care Executive at: Phone: 1860 123 1000 | Address: Supermarket Grocery Supplies Pvt Ltd. No7, Service Road, Domlur 100 Feet Road, Indiranagar, Bangalore 560071. | Email: customerservice@bigbasket.com</p>', 0, 52, 0, 0, 1, 1000, '2019-03-02 17:00:10'),
(18, 1, 7, 'Cardamom/Elaichi Green', 'Bangalore SRI Gayatri Trading Company', 'product_images/thumb/69a1d338dcb324f28873e74c82cef875.jpg', 'product_images/full/357b70deac41a8a45400fe9db031fcbb.jpg', '100 gm', 0, '<h2>About:</h2><hr>\r\n<p>CardamomÂ is well known as a spice used in Indian cooking, and is one of the primary constituents of Garam Masala. Cardamom is considered one of the most valuable spices in the world due to its rich aroma and therapeutic properties. Many varieties of cardamom exist, but there are two genera which include cardamom plants. The first, known scientifically asÂ EllatariaÂ and commonly referred to as green or true cardamom, is found mainly in India.</p><br><br>\r\n<h2>Other Product Info:</h2><hr>\r\n<p>EAN Code: 40073427\r\nManufactured by : Bangalore SRI Gayatri Trading Company #37, 2nd Floor, Raghuvanahalli, Kanakapura Road, Bangalore - 560062 Fssai Lic No11216302000385 | Kolkata MARK COMMODITIES 80 DR SURESH SARKAR ROAD KOLKATA-700014 Fssai Lic No12816019000954 | Chennai M.M Marketing (Chennai) No. 7/1 2nd floor, 1st Main, Off 100ft Road, Domlur 2nd Stage, Bangalore - 560071 Fssai Lic No10015042002228 | Patna M/S ASG VISION B-295, MITRA MONDAL COLONY , SAKET VIHAR , PATNA - 800002 Fssai Lic No10416000000798 | Ahmedabad Saarthi Enterprises , Kapildev Isabgol Industries, Khali Char rasta, Highway road, Siddhpur-384151, Gujrat Fssai Lic NoCC NO-02767-292252 | Mumbai UNISHA ENTERPRISES PVT LTD H-33 APMC Market - I, Phase - IIVashi Turbhe RoadMasala MarketVashiNavi Mumbai Fssai Lic No11517017000043 | Pune UNISHA ENTERPRISES PVT. LTD Unit I :H-33, APMC Market-I, Phase-II, Vashi, Navi Mumbai, Maharashtra, Indi-400705. Fssai Lic No11517017000043 | Pune UNISHA ENTERPRISES PVT. LTD Unit II : G-21, APMC Market-I, Phase-II, Vashi, Navi Mumbai, Maharashtra, India-400705. Fssai Lic No11517017000041 | Delhi STERLING GROCERIES PVT. LTD PLOT NO- 443 ECOTECH III, UK-II, GREATER NOIDA- 201308 Fssai Lic No12716055000185 | Vijayawada-Guntur OMKARESWARA AGENCIES (VJA) , 2/14/190, syamalanagar, 1stline, guntur-5220006 Fssai Lic No10117030000126 |\r\nMarketed by : Supermarket Grocery Supplies Pvt Ltd. No7, Service Road, Domlur 100 Feet Road, Indiranagar, Bangalore 560071\r\nBest before 16-01-2019\r\nFor Queries/Feedback/Complaints, Contact our Customer Care Executive at: Phone: 1860 123 1000 | Address: Supermarket Grocery Supplies Pvt Ltd. No7, Service Road, Domlur 100 Feet Road, Indiranagar, Bangalore 560071. | Email: customerservice@bigbasket.com</p>', 0, 169, 0, 0, 1, 200, '2018-10-19 03:23:17'),
(19, 1, 2, 'Banana - Yelakki', 'Supermarket Grocery Supplies Pvt. Ltd', 'product_images/thumb/53288ba52cf043b52e426111fdb69858.jpg', 'product_images/full/c6ab988342d3a8b098944c4944ac46cc.jpg', '1 kg', 0, '&lt;h2&gt;About&lt;/h2&gt;&lt;hr&gt;\r\n&lt;p&gt;Tiny and small sized, this variety is called Yelakki in Bangalore and Elaichi in Mumbai. Despite its small size, they are naturally flavoured, aromatic and sweeter compared to regular bananas. Yelakki bananas are around 3- 4 inches long and contain a thinner skin and better shelf life than Robusta bananas.&lt;/p&gt;\r\n&lt;br&gt;&lt;br&gt;\r\n&lt;h2&gt;Storage and Uses&lt;/h2&gt;&lt;hr&gt;\r\n&lt;p&gt;Store them in a cool, dry place away from direct sunlight. Fresh, raw yelakkis are green. They turn into golden yellow on ripening. Look for brown speckles and yellow skin to identify ripened ones.\r\nSlice them onto pancakes, blend into smoothies or add to fruit salads. Heat brings out the bananas\' creamy sweetness. Try baking or sauteing them with butter and sugar for a delicious dessert. &lt;/p&gt;\r\n&lt;br&gt;&lt;br&gt;\r\n&lt;h2&gt;Benefits&lt;/h2&gt;&lt;hr&gt;\r\n&lt;p&gt;One banana supplies 30 percent of the daily vitamin B6 requirement and is rich in vitamin C and potassium. It reduces appetite and promotes weight loss, while also boosting the immune system and keeping the bones strong. It is very good for pregnant women and athletes.&lt;/p&gt;\r\n&lt;br&gt;&lt;br&gt;\r\n&lt;h2&gt;Other Product Info&lt;/h2&gt;&lt;hr&gt;\r\n&lt;p&gt;EAN Code: 10000031\r\nSourced &amp; Marketed by: Supermarket Grocery Supplies Pvt. Ltd, No. 7, Service Road, Off 100 Feet Road Indiranagar Landmark: Above HDFC Bank Bangalore, Karnataka 560071\r\nBest before 3 days from delivery date\r\nFor Queries/Feedback/Complaints, Contact our Customer Care Executive at: Phone: 1860 123 1000 | Address: Supermarket Grocery Supplies Pvt Ltd. No7, Service Road, Domlur 100 Feet Road, Indiranagar, Bangalore 560071.&lt;/p&gt;', 0, 90, 0, 1, 1, 6000, '2019-03-12 11:13:12'),
(20, 1, 2, 'Apple - Fuji', 'Supermarket Grocery Supplies Pvt. Ltd,', 'product_images/thumb/a5d80de7993cabff2a5c1f978f5ca3b6.jpg', 'product_images/full/1abf674c43b187aebabaa9e8b3a8d866.jpg', '1 kg', 0, '&lt;h2&gt;About&lt;/h2&gt;&lt;hr&gt;\r\n&lt;p&gt;A fruit specially for the ones with a sweet tooth, Fuji apples are the sweetest apples around and come with a hint of vanilla flavour. These hybrid apples have creamy white, firm and finely grained flesh. These apples are crisp, juicy and sugary. Premium apples are handpicked by our experts to give you the best quality apples.&lt;/p&gt;&lt;br&gt;&lt;br&gt;\r\n&lt;h2&gt;Store and Usage&lt;/h2&gt;&lt;hr&gt;\r\n&lt;p&gt;Store them in a cool, dry place away from direct sunlight. Wrap them with newspaper individually to keep them fresh for a long time. If any apple goes bad, it protects other apples from getting spoiled. Take a cup of water, dissolve 1/8th teaspoon of salt in it. Soak freshly cut slices and drain them. Now, rinse them in fresh water so that they will not taste salty. Can be eaten as a fresh fruit or used in salads, fruithats, smoothies, cookies, pies. Roast Apple peel into a crispy snack.&lt;/p&gt;\r\n&lt;br&gt;&lt;br&gt;\r\n&lt;h2&gt;Benefits&lt;/h2&gt;&lt;hr&gt;\r\n&lt;p&gt;Apples are one of the healthiest fruits. Rich in vitamin C and dietary fiber which keep our digestive and immune system healthy. Protects from Alzheimers, type 2 diabetes and cancer.\r\nIt\'s a natural teeth whitener and prevent bad breath. Eating apple peel lowers the risk of obesity. Apple mask is an excellent cure for wrinkles&lt;/p&gt;\r\n&lt;br&gt;&lt;br&gt;\r\n&lt;h2&gt;Other Product info&lt;/h2&gt;&lt;hr&gt;\r\n&lt;p&gt;EAN Code: 40033815\r\nSourced &amp; Marketed by: Supermarket Grocery Supplies Pvt. Ltd, No. 7, Service Road, Off 100 Feet Road Indiranagar Landmark: Above HDFC Bank Bangalore, Karnataka 560071\r\nBest before 3 days from delivery date\r\nFor Queries/Feedback/Complaints, Contact our Customer Care Executive at: Phone: 1860 123 1000 | Address: Supermarket Grocery Supplies Pvt Ltd. No7, Service Road, Domlur 100 Feet Road, Indiranagar, Bangalore 560071.&lt;/p&gt;', 0, 160, 0, 1, 1, 2000, '2019-03-12 11:13:43'),
(21, 1, 2, 'Pomegranate', 'Supermarket Grocery Supplies Pvt. Ltd', 'product_images/thumb/0cee968e3c64c9b906cd3ded8964766e.jpg', 'product_images/full/4273a19e2e53ea62d4fba20242277f72.jpg', '2 pcs', 0, '&lt;h2&gt;About:&lt;/h2&gt;&lt;hr&gt;\r\n&lt;p&gt;Fresho pomegranates can be used to add a lot of bright colour to your fruit salad. After they are procured directly from farmers, they are packed in hygienic conditions so retain their freshness and nutritional value. This reddish-pink coloured fruit, packed with juicy seeds which can be plucked and added to salads, raita, jams and jellies.&lt;/p&gt;\r\n&lt;br&gt;&lt;br&gt;\r\n&lt;h2&gt;Benefits:&lt;/h2&gt;&lt;hr&gt;\r\n&lt;p&gt;Pomegranates are rich in anti-oxidants and help to prevent inflammation and cancer. They also keep the teeth clean, are a great source of your daily dose of fiber, regulate the cholesterol level and prevent arthritis.&lt;/p&gt;\r\n&lt;br&gt;&lt;br&gt;\r\n&lt;h2&gt;How to use ?:&lt;/h2&gt;&lt;hr&gt;\r\n&lt;p&gt;The pomegranate seeds are red bright in colour; adding them to your fruit or vegetable salad can add a nice red tinge to the food. They can be sprinkled on oatmeals, cereals, pancakes, cakes, puddings, or fruit desserts. They can act as perfect garnish or cake topping, especially if it is a tropical fruit cake.&lt;/p&gt;\r\n&lt;br&gt;&lt;br&gt;\r\n&lt;h2&gt;Other Product Info :&lt;/h2&gt;&lt;hr&gt;\r\n&lt;p&gt;EAN Code: 40042512&lt;br&gt;\r\nSourced &amp; Marketed by: Supermarket Grocery Supplies Pvt. Ltd, No. 7, Service Road, Off 100 Feet Road Indiranagar Landmark: Above HDFC Bank Bangalore, Karnataka 560071\r\nBest before 3 days from delivery date\r\nFor Queries/Feedback/Complaints, Contact our Customer Care Executive at: Phone: 1860 123 1000 | Address: Supermarket Grocery Supplies Pvt Ltd. No7, Service Road, Domlur 100 Feet Road, Indiranagar, Bangalore 560071. &lt;/p&gt;', 0, 65, 0, 1, 1, 3000, '2019-03-12 11:13:44'),
(22, 1, 2, 'Pear - Red', 'Supermarket Grocery Supplies Pvt. Ltd', 'product_images/thumb/9e56bca8558dfcc133d684be5650d2c8.jpg', 'product_images/full/73355e4252b1e0e655885c87c60bc7e4.jpg', '2 pcs', 0, '&lt;h2&gt;About&lt;/h2&gt;&lt;hr&gt;\r\n&lt;p&gt;Red pears have an off-white/cream coloured, juicy flesh that has a subtly sweet, mild flavour. Fresho imported red pears are the finest variety of pears.&lt;/p&gt;&lt;br&gt;&lt;br&gt;\r\n&lt;h2&gt;Storage and Uses&lt;/h2&gt;&lt;hr&gt;\r\n&lt;p&gt;Ripened pears are red. Store them in the refrigerator for 3-5 days. Gently press your thumb near the stem end of the fruit, if it is softer, then they are ready to eat.\r\nFeel the fresh texture of pears raw or in salads. Owing to the dense flesh, they can be consumed baked, roasted and grilled. Blend them into a smoothie when they over ripe.&lt;/p&gt;\r\n&lt;br&gt;&lt;br&gt;\r\n&lt;h2&gt;Benefits&lt;/h2&gt;&lt;hr&gt;\r\n&lt;p&gt;Anthocyanin, present in Red pears have anti ageing properties. It promotes heart health and prevents cancer. Pears are a rich source of fiber that helps in healthy bowel movements. Contains a good amount of copper that keeps the bones, nerves and immune system healthy.&lt;/p&gt;\r\n&lt;br&gt;&lt;br&gt;\r\n&lt;h2&gt;Other Product Info&lt;/h2&gt;&lt;hr&gt;\r\n&lt;p&gt;EAN Code: 40048953\r\nSourced &amp; Marketed by: Supermarket Grocery Supplies Pvt. Ltd, No. 7, Service Road, Off 100 Feet Road Indiranagar Landmark: Above HDFC Bank Bangalore, Karnataka 560071\r\nBest before 3 days from delivery date\r\nFor Queries/Feedback/Complaints, Contact our Customer Care Executive at: Phone: 1860 123 1000 | Address: Supermarket Grocery Supplies Pvt Ltd. No7, Service Road, Domlur 100 Feet Road, Indiranagar, Bangalore 560071.&lt;/p&gt;', 30, 113, 0, 1, 1, 20000, '2019-03-12 11:13:46'),
(23, 1, 2, 'Sapota', ' Supermarket Grocery Supplies Pvt. Ltd', 'product_images/thumb/b0bb3fe7b0a43b416732a4e9c1d31481.jpg', 'product_images/full/dbe2d402db85d3512be1020b346cb52c.jpg', '500 gm', 0, '&lt;h2&gt;About&lt;/h2&gt;&lt;hr&gt;\r\n&lt;p&gt;Brown skinned sapotas are smooth to grainy textured, musky-scented and deliciously sweet in taste. The flesh generally contains 2-3 large and inedible black seeds. Fresho sapotas are freshly plucked by our farmers who grow it organically and the best quality is delivered to you.&lt;/p&gt;&lt;br&gt;&lt;br&gt;\r\n&lt;h2&gt;Storage and Uses&lt;/h2&gt;\r\n&lt;p&gt;Store them in a cool, dry place away from direct sunlight. Sapotas can be eaten fresh or savoured with salads and custards. Scoop the flesh out and blend into juices and shakes. Prepare traditional sweets like halwa, barfi and kheer. As they are soft and easily consumable, they can be offered to growing babies.&lt;/p&gt;\r\n&lt;br&gt;&lt;br&gt;\r\n&lt;h2&gt;Benefits&lt;/h2&gt;&lt;hr&gt;\r\n&lt;p&gt;Sapotas naturally enhance skin texture, complexion and maintain good hair health. They stop blood loss during injuries and reduce tooth cavities. They also contain anti-inflammatory properties and act as a detoxifying agent. They are good for pregnant women and lactating mothers.&lt;/p&gt;\r\n&lt;br&gt;&lt;br&gt;\r\n&lt;h2&gt;Other Product Info&lt;/h2&gt;\r\n&lt;hr&gt;\r\n&lt;p&gt;EAN Code: 40022646\r\nSourced &amp; Marketed by: Supermarket Grocery Supplies Pvt. Ltd, No. 7, Service Road, Off 100 Feet Road Indiranagar Landmark: Above HDFC Bank Bangalore, Karnataka 560071\r\nBest before 3 days from delivery date\r\nFor Queries/Feedback/Complaints, Contact our Customer Care Executive at: Phone: 1860 123 1000 | Address: Supermarket Grocery Supplies Pvt Ltd. No7, Service Road, Domlur 100 Feet Road, Indiranagar, Bangalore 560071.&lt;/p&gt;\r\n', 20, 68, 0, 0, 1, 300, '2019-03-12 11:11:19'),
(24, 1, 2, 'Guava', 'Supermarket Grocery Supplies Pvt. Ltd', 'product_images/thumb/96984900374522f14e26c5e77bcc6632.jpg', 'product_images/full/b80abe1fe794370af6096fd14be45791.jpg', '500 gm', 0, '&lt;h2&gt;About&lt;/h2&gt;&lt;hr&gt;\r\n&lt;p&gt;Savour the green guavas along with hard, pale yellow edible seeds. The off-white flesh is crunchy and mildly sweet with very good fragrance. We selectively pick organically grown guavas from the best farms.&lt;/p&gt;&lt;br&gt;&lt;br&gt;\r\n&lt;h2&gt;Storage and Uses&lt;/h2&gt;\r\n&lt;hr&gt;\r\n&lt;p&gt;Ripe guavas can be stored in the refrigerator. They get softer and sweeter as they are kept at room temperature for ripening. Do not eat them on empty stomach.&lt;br&gt;\r\nGuavas be eaten fresh. Slightly raw ones are added in salads. Used in making juices, smoothies, desserts. Give a touch of spice to guava pieces by sprinkling with salt and chilli powder. &lt;/p&gt;\r\n&lt;br&gt;&lt;br&gt;\r\n&lt;h2&gt;Benefits&lt;/h2&gt;&lt;hr&gt;\r\n&lt;p&gt;Guavas reduce the risk of diabetes and regulate blood pressure levels. They are rich in vitamin A, C, folate, fiber, lycopene and other essential minerals. Help in improving eye health.&lt;/p&gt;\r\n&lt;br&gt;&lt;br&gt;\r\n&lt;h2&gt;Other Product Info&lt;/h2&gt;\r\n&lt;hr&gt;\r\n&lt;p&gt;EAN Code: 50000518&lt;br&gt;\r\nSourced &amp; Marketed by: Supermarket Grocery Supplies Pvt. Ltd, No. 7, Service Road, Off 100 Feet Road Indiranagar Landmark: Above HDFC Bank Bangalore, Karnataka 560071\r\nBest before 3 days from delivery date\r\nFor Queries/Feedback/Complaints, Contact our Customer Care Executive at: Phone: 1860 123 1000 | Address: Supermarket Grocery Supplies Pvt Ltd. No7, Service Road, Domlur 100 Feet Road, Indiranagar, Bangalore 560071.&lt;/p&gt;', 20, 68, 0, 0, 1, 23330, '2019-03-12 11:11:21'),
(25, 1, 2, 'Watermelon', ' Supermarket Grocery Supplies Pvt. Ltd', 'product_images/thumb/8e1e1692c5fc20bd2b02c7aaa5f4f134.jpg', 'product_images/full/f9ffacfd8a3a9131c8d216da044e309b.jpg', '1.5-2.5 kg', 0, '&lt;h2&gt;About&lt;h2&gt;&lt;hr&gt;\r\n&lt;p&gt;With greenish black to smooth dark green surface, we selectively pick organically grown watermelons from the best farms\r\nThese watermelons have juicy, sweet and grainy textured flesh filled with 12-14% of sugar content, making it a healthy alternative to sugary carbonated drinks. Flesh colour of these are pink to red with dark brown/black seeds.&lt;/p&gt;\r\n&lt;br&gt;&lt;br&gt;\r\n&lt;h2&gt;Storage and Uses&lt;/h2&gt;&lt;hr&gt;\r\n&lt;p&gt;Store them in a cool, dry place away from direct sunlight.\r\nCut and serve the melons chilled.&lt;br&gt;\r\nCan be eaten fresh- scoop them up with ice creams or in fruit salads.Spice up your watermelon with a tinge of mint leaves.&lt;br&gt;\r\nUsed in cocktails and fresh juices which also serves as a healthy alternative to sugary carbonated drinks. Rind can be used to prepare pickles, curries and pies. Seeds can be roasted with salt and consumed.&lt;/p&gt;\r\n&lt;br&gt;&lt;br&gt;\r\n&lt;h2&gt;Benefits&lt;/h2&gt;&lt;hr&gt;\r\n&lt;p&gt;Watermelons have excellent hydrating properties with 90% water content.\r\nRich in anti-oxidant flavonoids that protects against prostate, breast, colon, pancreatic and lung cancers. They are an excellent source of lycopene which protects skin against harmful UV rays. It is also a great source for A, C, B-complex vitamins, iron and fiber which boosts body metabolism.&lt;/p&gt;\r\n&lt;br&gt;&lt;br&gt;\r\n&lt;h2&gt;Other Product Info&lt;/h2&gt;&lt;hr&gt;\r\n&lt;p&gt;EAN Code: 40023482&lt;br&gt;\r\nSourced &amp; Marketed by: Supermarket Grocery Supplies Pvt. Ltd, No. 7, Service Road, Off 100 Feet Road Indiranagar Landmark: Above HDFC Bank Bangalore, Karnataka 560071\r\nBest before 3 days from delivery date\r\nFor Queries/Feedback/Complaints, Contact our Customer Care Executive at: Phone: 1860 123 1000 | Address: Supermarket Grocery Supplies Pvt Ltd. No7, Service Road, Domlur 100 Feet Road, Indiranagar, Bangalore 560071.&lt;/p&gt;', 20, 118, 0, 0, 1, 256, '2019-03-12 11:11:26'),
(26, 1, 2, 'Papaya', 'Supermarket Grocery Supplies Pvt. LtdSupermarket Grocery Supplies Pvt. Ltd', 'product_images/thumb/3eafbe891cb062183fb462d22c8ccbab.jpg', 'product_images/full/579886a33a38a39c94d085fe1147acf3.jpg', '700 kg', 0, '&lt;h2&gt;About&lt;/h2&gt;\r\n&lt;hr /&gt;\r\n&lt;p&gt;ripe papayas have blend of sweet buttery consistency and sour taste. They are half green and half yellow. Ripe papaya have orange flesh and black coloured seeds at the centre.&lt;/p&gt;\r\n&lt;h2&gt;Storage and uses&lt;/h2&gt;\r\n&lt;hr /&gt;\r\n&lt;p&gt;Semi ripe papaya will be ripened furthur if stored at room temperature. Suitable for salad and can be eaten fresh.&lt;/p&gt;\r\n&lt;h2&gt;Benefits&lt;/h2&gt;\r\n&lt;hr /&gt;\r\n&lt;p&gt;Papayas reduce the risk of macular degeneration, a disease that affects the eyes as people age. They prevent asthma and cancer. Mashed papayas help in wound healing and preventing infections. The potassium and fiber content present in papayas help to ward off heart diseases.&lt;/p&gt;\r\n&lt;h3&gt;&amp;nbsp;&lt;/h3&gt;\r\n', 20, 43, 0, 0, 1, 2000, '2019-03-12 11:11:29'),
(27, 1, 3, 'Organic - Tur/Toor Dal, Unpolished', 'Bangalore Papa\'s Trading', 'product_images/thumb/bc0215ebd33a1ab67daa0691fda5246a.jpg', 'product_images/full/baf94ed092f120609f6e5945a18609f9.jpg', '2 kg', 0, '&lt;h1&gt;Some Text&lt;/h1&gt;', 22, 219, 0, 1, 1, 3000, '2019-04-22 20:06:21'),
(28, 1, 3, 'Organic - Moong Dal, Unpolished', 'Bangalore Papa\'s Trading', 'product_images/thumb/e7b6cd80ad0eb0ebfc4196828f3efc5c.jpg', 'product_images/full/673d405b210c3fc2b62d89d669e29890.jpg', '2 kg', 0, '&lt;h4&gt;About&lt;/h4&gt;&lt;hr&gt;&lt;p&gt;Moong dal will get from Mung beans. The split moong dal is utilized in Indian curries. It is high in fiber and protein, other than low on fat. This is cultivated without the use of pesticides, artificial fertilizers or chemicals.&lt;/p&gt;\r\n&lt;br&gt;&lt;br&gt;\r\n&lt;h4&gt;How to Use ?&lt;/h4&gt;&lt;hr&gt;\r\n&lt;p&gt;Moong dal is cooked as any other dal is cooked. It can be used as stuffings.&lt;/p&gt;\r\n&lt;br&gt;&lt;br&gt;\r\n&lt;h4&gt;Other Product Info&lt;/h4&gt;\r\n&lt;hr&gt;\r\n&lt;p&gt;\r\nEAN Code: __EAN__\r\nManufactured by : Bangalore Papa\'s Trading No 39/40, 2nd Cross, KN Govindareddy Layout, Arkere, Bannerghatta Road, Bangalore - 560076 Fssai Lic No11214334000011 | Kolkata Samruddhi Organic Farm Pvt Ltd 506, Amanora Chambers East Amonora Town Centre Pune - 28 Fssai Lic No11515036000072 | Chennai PAPAS TRADING PVT LTD No. 39/40, 2nd Cross, KN Govind Reddy layout, Arekere, BG Road, Banglore - 76. Fssai Lic No11214334000011 | Patna SAMRUDDHI ORGANIC FARM (I) PVT LTD(PUNE) 506, AMANORA CHAMBERS EAST, AMANORA TOW CENTRE, PUNE-28 Fssai Lic No11515036000072 | Ahmedabad Samruddhi Organic Farm (I) Pvt ltd, 506, Amanora Chambers, East Amonora TownCenter, Pune-28 Fssai Lic No11515036000072 | Mumbai Samruddhi organic farm (i) Pvt ltd , 506, Amanora Chambers, East Amonora TownCenter, Pune-28 Fssai Lic No11515036000072 | Pune Samruddhi Organic Farm (I) Pvt. Ltd (Pune) , 506, Amanora Chambers, East Amonora TownCenter, Pune-28 Fssai Lic No11515036000072 | Delhi TRETA AGRO PVT. LTD. 39-B, GHODA MUHALLA, AYA NAGAR, NEW DELHI-110047 Fssai Lic No13315008000307 | Vijayawada-Guntur PAPAS TRADING PVT LTD (VJA) , no 39/40, 2nd cross, kn Govind reddy layout, Arekere, BG Road, banglore-76 Fssai Lic No11214334000011 |\r\nMarketed by : Supermarket Grocery Supplies Pvt Ltd. No7, Service Road, Domlur 100 Feet Road, Indiranagar, Bangalore 560071\r\nCountry of origin: India\r\nBest before __PSL__ days from delivery date\r\nFor Queries/Feedback/Complaints, Contact our Customer Care Executive at: Phone: 1860 123 1000 | Address: Innovative Retail Concepts Private Limited, No.18, 2nd &amp; 3rd Floor, 80 Feet Main Road, Koramangala 4th Block, Bangalore - 560034 | Email: customerservice@bigbasket.com \r\n&lt;/p&gt;', 22, 229, 0, 1, 1, 3500, '2019-04-22 20:06:12'),
(29, 1, 3, 'Kabuli Chana/Channa', 'Bangalore Papa\'s Trading', 'product_images/thumb/2d379d4f3d48a9b93c916744c5511c32.jpg', 'product_images/full/7494e1f04590df1efc21a9ec9b1b842b.jpg', '500 gm', 0, '&lt;h4&gt;About&lt;/h4&gt;\r\n&lt;hr&gt;\r\n&lt;p&gt;BB Royal Organic Kabuli Channa contains got high fiber content, they are proper vegetarian stuffs &amp; hence good to fill your stomach with. Bring home BB Royal Organic Kabuli Chana and like the real taste of it which is free from synthetic chemicals and pesticides.&lt;/p&gt;\r\n&lt;br&gt;&lt;br&gt;\r\n&lt;h4&gt;How to use ?&lt;/h4&gt;\r\n&lt;hr&gt;\r\n&lt;p&gt;Used in making popular dish-Punjabhi chole masala. Intake of Kabuli chana may assist you in controling stomach disorders, including acid reflux, gastric ulcers &amp; many more.&lt;/p&gt;\r\n&lt;br&gt;&lt;br&gt;\r\n&lt;h4&gt;Other Product Info&lt;/h4&gt;\r\n&lt;hr&gt;\r\n&lt;p&gt;EAN Code: 400724550001\r\nManufactured by : Bangalore Papa\'s Trading No 39/40, 2nd Cross, KN Govindareddy Layout, Arkere, Bannerghatta Road, Bangalore - 560076 Fssai Lic No11214334000011 | Kolkata Samruddhi Organic Farm Pvt Ltd 506, Amanora Chambers East Amonora Town Centre Pune - 28 Fssai Lic No11515036000072 | Chennai PAPAS TRADING PVT LTD No. 39/40, 2nd Cross, KN Govind Reddy layout, Arekere, BG Road, Banglore - 76. Fssai Lic No11214334000011 | Patna SAMRUDDHI ORGANIC FARM (I) PVT LTD(PUNE) 506, AMANORA CHAMBERS EAST, AMANORA TOW CENTRE, PUNE-28 Fssai Lic No11515036000072 | Ahmedabad Samruddhi Organic Farm (I) Pvt ltd, 506, Amanora Chambers, East Amonora TownCenter, Pune-28 Fssai Lic No11515036000072 | Mumbai Samruddhi organic farm (i) Pvt ltd , 506, Amanora Chambers, East Amonora TownCenter, Pune-28 Fssai Lic No11515036000072 | Pune Samruddhi Organic Farm (I) Pvt. Ltd (Pune) , 506, Amanora Chambers, East Amonora TownCenter, Pune-28 Fssai Lic No11515036000072 | Delhi TRETA AGRO PVT. LTD. 39-B, GHODA MUHALLA, AYA NAGAR, NEW DELHI-110047 Fssai Lic No13315008000307 | Vijayawada-Guntur PAPAS TRADING PVT LTD (VJA) , no 39/40, 2nd cross, kn Govind reddy layout, Arekere, BG Road, banglore-76 Fssai Lic No11214334000011 |\r\nMarketed by : Supermarket Grocery Supplies Pvt Ltd. No7, Service Road, Domlur 100 Feet Road, Indiranagar, Bangalore 560071\r\nBest before 21-04-2019\r\nFor Queries/Feedback/Complaints, Contact our Customer Care Executive at: Phone: 1860 123 1000 | Address: Innovative Retail Concepts Private Limited, No.18, 2nd &amp; 3rd Floor, 80 Feet Main Road, Koramangala 4th Block, Bangalore - 560034 | Email: customerservice@bigbasket.com &lt;/p&gt;', 59, 140, 0, 1, 1, 1500, '2019-04-22 20:06:17'),
(30, 1, 3, 'Organic - Green Moong Whole', 'Bangalore Papa\'s Trading', 'product_images/thumb/45f3b915ed976d834c35e696a6ebaaaf.jpg', 'product_images/full/dcdd290736f118a0b22885d4cf686b53.jpg', '2 kg', 0, '&lt;h4&gt;About&lt;/h4&gt;\r\n&lt;hr&gt;\r\n&lt;p&gt;Green Moong Whole is also known as a green bean and they are small cylindrical beans with bright green skin. Also, they are very nutritious and mild in flavour, green gram takes on the taste of the spices and other ingredients added to it. It is a fine supply of protein and dietary fibre. This is cultivated without the use of pesticides, artificial fertilizers or chemicals. It reduces weight and also, cures diabetes.&lt;/p&gt;\r\n&lt;br&gt;&lt;br&gt;\r\n&lt;h4&gt;How to Use ?&lt;/h4&gt;\r\n&lt;hr&gt;\r\n&lt;p&gt;Green gram, also known as the mung bean, is a small round bean similar in shape to the field pea. People in the U.S. primarily eat green gram as a sprout, and as a bean it cooks up fast and has a sweet flavour. With its high fibre and nutrient content, it offers a number of health benefits. &lt;/p&gt;\r\n&lt;br&gt;&lt;br&gt;\r\n&lt;h4&gt;Other Product Info&lt;/h4&gt;\r\n&lt;hr&gt;\r\n&lt;p&gt;\r\nEAN Code: __EAN__\r\nManufacturer name &amp; address: Bangalore Papas Trading No 39/40, 2nd Cross, KN Govindareddy Layout, Arkere, Bannerghatta Road, Bangalore - 560076 Fssai Lic No11214334000011 | Kolkata Samruddhi Organic Farm Pvt Ltd 506, Amanora Chambers East Amonora Town Centre Pune - 28 Fssai Lic No11515036000072 | Chennai PAPAS TRADING PVT LTD No. 39/40, 2nd Cross, KN Govind Reddy layout, Arekere, BG Road, Banglore - 76. Fssai Lic No11214334000011 | Patna SAMRUDDHI ORGANIC FARM (I) PVT LTD(PUNE) 506, AMANORA CHAMBERS EAST, AMANORA TOW CENTRE, PUNE-28 Fssai Lic No11515036000072 | Ahmedabad Samruddhi Organic Farm (I) Pvt ltd,506, Amanora Chambers, East Amonora TownCenter, Pune-28 Fssai Lic No11515036000072 | Mumbai Samruddhi organic farm (i) Pvt ltd ,506, Amanora Chambers, East Amonora TownCenter, Pune-28 Fssai Lic No11515036000072 | Pune Samruddhi Organic Farm (I) Pvt. Ltd (Pune) ,506, Amanora Chambers, East Amonora TownCenter, Pune-28 Fssai Lic No11515036000072 | Delhi TRETA AGRO PVT. LTD. 39-B, GHODA MUHALLA, AYA NAGAR, NEW DELHI-110047 Fssai Lic No13315008000307 | Vijayawada-Guntur PAPAS TRADING PVT LTD (VJA) ,no 39/40,2nd cross,kn Govind reddy layout,Arekere,BG Road,banglore-76 Fssai Lic No11214334000011 |\r\nCountry of origin: India\r\nBest before __PSL__ days from delivery date\r\nFor Queries/Feedback/Complaints, Contact our Customer Care Executive at: Phone: 1860 123 1000 | Address: Supermarket Grocery Supplies Pvt Ltd. No7, Service Road, Domlur 100 Feet Road, Indiranagar, Bangalore 560071.\r\n&lt;/p&gt;', 24, 295, 0, 1, 1, 3000, '2019-04-22 20:06:25'),
(31, 1, 3, 'Organic - Brown Sugar', 'Bangalore Papa\'s Trading', 'product_images/thumb/3019d50b09ab13a830be81af85a5259b.jpg', 'product_images/full/9907553678b5d6b30c696ef400b59ede.jpg', '1 kg', 0, '&lt;h4&gt;ABout&lt;/h4&gt;\r\n&lt;hr&gt;\r\n&lt;p&gt;Organic Brown sugar is a sucrose sugar product with a distinctive brown color due to the presence of Organic molasses. It is either an unrefined or partially refined soft sugar consisting of sugar crystals with some residual molasses content, or it is produced by the addition of molasses to refined white sugar (commercial brown sugar).&lt;/p&gt;\r\n&lt;br&gt;&lt;br&gt;\r\n&lt;h4&gt;Other Product Info&lt;/h4&gt;\r\n&lt;hr&gt;\r\n&lt;p&gt;\r\nEAN Code: 40072302\r\nManufactured by : Bangalore Papa\'s Trading No 39/40, 2nd Cross, KN Govindareddy Layout, Arkere, Bannerghatta Road, Bangalore - 560076 Fssai Lic No11214334000011 | Kolkata Samruddhi Organic Farm Pvt Ltd 506, Amanora Chambers East Amonora Town Centre Pune - 28 Fssai Lic No11515036000072 | Chennai PAPAS TRADING PVT LTD No. 39/40, 2nd Cross, KN Govind Reddy layout, Arekere, BG Road, Banglore - 76. Fssai Lic No11214334000011 | Patna SAMRUDDHI ORGANIC FARM (I) PVT LTD(PUNE) 506, AMANORA CHAMBERS EAST, AMANORA TOW CENTRE, PUNE-28 Fssai Lic No11515036000072 | Ahmedabad Samruddhi Organic Farm (I) Pvt ltd, 506, Amanora Chambers, East Amonora TownCenter, Pune-28 Fssai Lic No11515036000072 | Mumbai Samruddhi organic farm (i) Pvt ltd , 506, Amanora Chambers, East Amonora TownCenter, Pune-28 Fssai Lic No11515036000072 | Pune Samruddhi Organic Farm (I) Pvt. Ltd (Pune) , 506, Amanora Chambers, East Amonora TownCenter, Pune-28 Fssai Lic No11515036000072 | Delhi TRETA AGRO PVT. LTD. 39-B, GHODA MUHALLA, AYA NAGAR, NEW DELHI-110047 Fssai Lic No13315008000307 | Vijayawada-Guntur PAPAS TRADING PVT LTD (VJA) , no 39/40, 2nd cross, kn Govind reddy layout, Arekere, BG Road, banglore-76 Fssai Lic No11214334000011 |\r\nMarketed by : Supermarket Grocery Supplies Pvt Ltd. No7, Service Road, Domlur 100 Feet Road, Indiranagar, Bangalore 560071\r\nBest before 22-08-2019\r\nFor Queries/Feedback/Complaints, Contact our Customer Care Executive at: Phone: 1860 123 1000 | Address: Innovative Retail Concepts Private Limited, No.18, 2nd &amp; 3rd Floor, 80 Feet Main Road, Koramangala 4th Block, Bangalore - 560034\r\n&lt;/p&gt;', 26, 119, 0, 1, 1, 6000, '2019-04-22 20:06:28');
INSERT INTO `products` (`product_id`, `cat_id`, `sub_cat_id`, `product_name`, `company_name`, `product_image`, `product_image_full`, `product_weight`, `veg_nonveg`, `product_desc`, `product_discount`, `product_price`, `old_price`, `has_offers`, `product_status`, `product_stock`, `product_add_time`) VALUES
(32, 1, 3, 'Organic - Jaggery', 'Bangalore Papa\'s Trading', 'product_images/thumb/7896c82a3d2249ff33bbccc481cf762d.jpg', 'product_images/full/ef4f57b11d62e94dd2da7eaf7cc91728.jpg', '400 gm', 0, '&lt;h4&gt;About&lt;/h4&gt;\r\n&lt;hr&gt;\r\n&lt;p&gt;Organic jaggery has the added benefit of having no use of chemicals at every one stage of production including while raising the source sugarcane and is chemical-free. BB Royal presents Organic Jaggery for you to like its health benefits in the purest form likely.&lt;/p&gt;\r\n&lt;br&gt;&lt;br&gt;\r\n&lt;h4&gt;How to use?&lt;/h4&gt;\r\n&lt;hr&gt;\r\n&lt;p&gt;It used as a sweetener in hot beverages and dishes such as pongal and other desserts.&lt;/p&gt;\r\n&lt;br&gt;&lt;br&gt;\r\n&lt;h4&gt;Other Product Info&lt;/h4&gt;\r\n&lt;hr&gt;\r\n&lt;p&gt;\r\nEAN Code: __EAN__\r\nManufactured by : Bangalore Papa\'s Trading No 39/40, 2nd Cross, KN Govindareddy Layout, Arkere, Bannerghatta Road, Bangalore - 560076 Fssai Lic No11214334000011 | Kolkata Samruddhi Organic Farm Pvt Ltd 506, Amanora Chambers East Amonora Town Centre Pune - 28 Fssai Lic No11515036000072 | Chennai PAPAS TRADING PVT LTD No. 39/40, 2nd Cross, KN Govind Reddy layout, Arekere, BG Road, Banglore - 76. Fssai Lic No11214334000011 | Patna SAMRUDDHI ORGANIC FARM (I) PVT LTD(PUNE) 506, AMANORA CHAMBERS EAST, AMANORA TOW CENTRE, PUNE-28 Fssai Lic No11515036000072 | Ahmedabad Samruddhi Organic Farm (I) Pvt ltd, 506, Amanora Chambers, East Amonora TownCenter, Pune-28 Fssai Lic No11515036000072 | Mumbai Samruddhi organic farm (i) Pvt ltd , 506, Amanora Chambers, East Amonora TownCenter, Pune-28 Fssai Lic No11515036000072 | Pune Samruddhi Organic Farm (I) Pvt. Ltd (Pune) , 506, Amanora Chambers, East Amonora TownCenter, Pune-28 Fssai Lic No11515036000072 | Delhi TRETA AGRO PVT. LTD. 39-B, GHODA MUHALLA, AYA NAGAR, NEW DELHI-110047 Fssai Lic No13315008000307 | Vijayawada-Guntur PAPAS TRADING PVT LTD (VJA) , no 39/40, 2nd cross, kn Govind reddy layout, Arekere, BG Road, banglore-76 Fssai Lic No11214334000011 |\r\nMarketed by : Supermarket Grocery Supplies Pvt Ltd. No7, Service Road, Domlur 100 Feet Road, Indiranagar, Bangalore 560071\r\nCountry of origin: India\r\nBest before __PSL__ days from delivery date\r\nFor Queries/Feedback/Complaints, Contact our Customer Care Executive at: Phone: 1860 123 1000 | Address: Innovative Retail Concepts Private Limited, No.18, 2nd &amp; 3rd Floor, 80 Feet Main Road, Koramangala 4th Block, Bangalore - 560034\r\n&lt;/p&gt;', 27, 55, 0, 1, 1, 5000, '2019-04-22 20:06:31'),
(33, 1, 3, 'Organic - Methi', 'Bangalore Papa\'s Trading', 'product_images/thumb/ddd674dbd449d1c331906e0a556ab7c0.jpg', 'product_images/full/da8ab1fc6c3a0dbf91f5715e19e23c26.jpg', '100 gm', 0, '&lt;h4&gt;About&lt;/h4&gt;\r\n&lt;hr&gt;\r\n&lt;p&gt;\r\nFenugreek is primarily used as a culinary spice, it contains protein, vitamins, niacin and a compound very similar to estrogen, hence it is good to overcome very common symptoms of menopause.This is cultivated without the use of pesticides ,artificial fertilizers or chemicals. \r\n&lt;/p&gt;\r\n&lt;br&gt;&lt;br&gt;\r\n&lt;h4&gt;How to use?&lt;/h4&gt;\r\n&lt;hr&gt;&lt;p&gt;Fenugreek is primarily used as a culinary spice.&lt;/p&gt;&lt;br&gt;&lt;br&gt;\r\n&lt;h4&gt;Other Product Info&lt;/h4&gt;&lt;hr&gt;\r\n&lt;p&gt;\r\nEAN Code: 40078476\r\nManufactured by : Bangalore Papa\'s Trading No 39/40, 2nd Cross, KN Govindareddy Layout, Arkere, Bannerghatta Road, Bangalore - 560076 Fssai Lic No11214334000011 | Kolkata Samruddhi Organic Farm Pvt Ltd 506, Amanora Chambers East Amonora Town Centre Pune - 28 Fssai Lic No11515036000072 | Chennai PAPAS TRADING PVT LTD No. 39/40, 2nd Cross, KN Govind Reddy layout, Arekere, BG Road, Banglore - 76. Fssai Lic No11214334000011 | Patna SAMRUDDHI ORGANIC FARM (I) PVT LTD(PUNE) 506, AMANORA CHAMBERS EAST, AMANORA TOW CENTRE, PUNE-28 Fssai Lic No11515036000072 | Ahmedabad Samruddhi Organic Farm (I) Pvt ltd, 506, Amanora Chambers, East Amonora TownCenter, Pune-28 Fssai Lic No11515036000072 | Mumbai Samruddhi organic farm (i) Pvt ltd , 506, Amanora Chambers, East Amonora TownCenter, Pune-28 Fssai Lic No11515036000072 | Pune Samruddhi Organic Farm (I) Pvt. Ltd (Pune) , 506, Amanora Chambers, East Amonora TownCenter, Pune-28 Fssai Lic No11515036000072 | Delhi TRETA AGRO PVT. LTD. 39-B, GHODA MUHALLA, AYA NAGAR, NEW DELHI-110047 Fssai Lic No13315008000307 | Vijayawada-Guntur PAPAS TRADING PVT LTD (VJA) , no 39/40, 2nd cross, kn Govind reddy layout, Arekere, BG Road, banglore-76 Fssai Lic No11214334000011 |\r\nMarketed by : Supermarket Grocery Supplies Pvt Ltd. No7, Service Road, Domlur 100 Feet Road, Indiranagar, Bangalore 560071\r\nBest before 21-05-2019\r\nFor Queries/Feedback/Complaints, Contact our Customer Care Executive at: Phone: 1860 123 1000 | Address: Innovative Retail Concepts Private Limited, No.18, 2nd &amp; 3rd Floor, 80 Feet Main Road, Koramangala 4th Block, Bangalore - 560034\r\n&lt;/p&gt;', 25, 16, 0, 1, 1, 5600, '2019-04-22 20:06:35'),
(34, 1, 3, 'Organic - Sugar', 'Bangalore Papa\'s Trading', 'product_images/thumb/7898e4314beaa85bca191499dfbe3d13.jpg', 'product_images/full/76ed00de69afc840b6f9822628112f46.jpg', '1 kg', 0, '&lt;h4&gt;About&lt;/h4&gt;&lt;hr&gt;\r\n&lt;p&gt;organic Sugar product is free from any exposures to chemicals. This is made from high class sugarcane and is purified under a firm process is to produce organic manure, organic sugar cane like dung or compost is used. This product is uniformly crystallized and blends well with all other food ingredients and makes your sweet dish more tasty. It is free from synthetic chemicals and pesticides.&lt;/p&gt;&lt;br&gt;&lt;br&gt;&lt;h4&gt;How to use?&lt;/h4&gt;\r\n&lt;hr&gt;&lt;p&gt;It is perfect for baking or to sweeten coffee, tea or any beverage. It is perfect for baking your favorite cookies or to use while preparing your favorite meal.&lt;/p&gt;\r\n&lt;br&gt;&lt;br&gt;\r\n&lt;br&gt;&lt;h4&gt;Other Product Info&lt;/h4&gt;\r\n&lt;hr&gt;\r\n&lt;p&gt;\r\nEAN Code: 40072492\r\nManufactured by : Bangalore Papa\'s Trading No 39/40, 2nd Cross, KN Govindareddy Layout, Arkere, Bannerghatta Road, Bangalore - 560076 Fssai Lic No11214334000011 | Kolkata Samruddhi Organic Farm Pvt Ltd 506, Amanora Chambers East Amonora Town Centre Pune - 28 Fssai Lic No11515036000072 | Chennai PAPAS TRADING PVT LTD No. 39/40, 2nd Cross, KN Govind Reddy layout, Arekere, BG Road, Banglore - 76. Fssai Lic No11214334000011 | Patna SAMRUDDHI ORGANIC FARM (I) PVT LTD(PUNE) 506, AMANORA CHAMBERS EAST, AMANORA TOW CENTRE, PUNE-28 Fssai Lic No11515036000072 | Ahmedabad Samruddhi Organic Farm (I) Pvt ltd, 506, Amanora Chambers, East Amonora TownCenter, Pune-28 Fssai Lic No11515036000072 | Mumbai Samruddhi organic farm (i) Pvt ltd , 506, Amanora Chambers, East Amonora TownCenter, Pune-28 Fssai Lic No11515036000072 | Pune Samruddhi Organic Farm (I) Pvt. Ltd (Pune) , 506, Amanora Chambers, East Amonora TownCenter, Pune-28 Fssai Lic No11515036000072 | Delhi TRETA AGRO PVT. LTD. 39-B, GHODA MUHALLA, AYA NAGAR, NEW DELHI-110047 Fssai Lic No13315008000307 | Vijayawada-Guntur PAPAS TRADING PVT LTD (VJA) , no 39/40, 2nd cross, kn Govind reddy layout, Arekere, BG Road, banglore-76 Fssai Lic No11214334000011 |\r\nMarketed by : Supermarket Grocery Supplies Pvt Ltd. No7, Service Road, Domlur 100 Feet Road, Indiranagar, Bangalore 560071\r\nBest before 22-08-2019\r\nFor Queries/Feedback/Complaints, Contact our Customer Care Executive at: Phone: 1860 123 1000 | Address: Innovative Retail Concepts Private Limited, No.18, 2nd &amp; 3rd Floor, 80 Feet Main Road, Koramangala 4th Block, Bangalore - 560034\r\n&lt;/p&gt;', 35, 110, 0, 0, 1, 8012, '2019-02-20 03:46:20'),
(35, 1, 6, 'Bhujia Sev', 'Haldiram Foods International Private Ltd.', 'product_images/thumb/1807fe045707928f48b07c4329d5c4b8.jpg', 'product_images/full/5970668dc0afdc77748bcd7b472e3375.jpg', '1 kg', 0, '&lt;h4&gt;About&lt;/h4&gt;\r\n&lt;hr&gt;\r\n&lt;p&gt;Bikaneri Famous Hot-N-Spicy Extruded Fried Indian Snacks. &lt;/p&gt;\r\n&lt;br&gt;&lt;br&gt;\r\n&lt;h4&gt;Ingredients&lt;/h4&gt;\r\n&lt;hr&gt;\r\n&lt;p&gt;Tapary Beans Flour (Moth), Edible Vegetable Oil, Chick Peas Flour, Salt, Red Chilli Powder, Clove Powder, Black Pepper, Dried Ginger Powder, Cardamom, Bay Leaves.&lt;/p&gt;\r\n&lt;br&gt;&lt;br&gt;\r\n&lt;h4&gt;About&lt;/h4&gt;\r\n&lt;hr&gt;\r\n&lt;p&gt;Children especially love this snack. They can carry a small convenient pack to their schools or you can take it your office for those break times. Haldiram\'s price is also quite reasonable. Buy Haldiramâ€™s snack online now and have it delivered right to your doorstep! &lt;/p&gt;\r\n&lt;br&gt;&lt;br&gt;\r\n&lt;h4&gt;Other Product Info&lt;/h4&gt;\r\n&lt;hr&gt;\r\n&lt;p&gt;EAN Code: 890400400069\r\nManufactured by: Haldiram Foods International Private Ltd, 20 Km Stone, Vill. Gumthala, Bhandara Road, Nagpur - 441104 (M.S.)\r\nBest before 21-05-2019\r\nFor Queries/Feedback/Complaints, Contact our Customer Care Executive at: Phone: 1860 123 1000 | Address: Innovative Retail Concepts Private Limited, No.18, 2nd &amp; 3rd Floor, 80 Feet Main Road, Koramangala 4th Block, Bangalore - 560034&lt;/p&gt;', 0, 210, 0, 0, 1, 5648, '2019-03-02 16:59:52'),
(36, 1, 6, 'Lays Potato Chips', 'Lays India', 'product_images/thumb/a71753d193e48a02dcdced7ad2d580ec.jpg', 'product_images/full/da7f6ece3b8b0f8ad2c0f1bf514c3c61.jpg', '52 gm', 0, '&lt;h4&gt;About&lt;/h4&gt;\r\n&lt;hr&gt;\r\n&lt;p&gt;Taste the unbeatable blend of delectable Indian spices with best quality potatoes. From the everyday snack to the impromptu get-togethers, LAYS chips are the perfect addition to any occasion.Whether its party time or family time, everyone loves gathering around the chip bowl. About the brand- Lays, the worlds largest and favourite snack food brand, has steadily established itself as an indispensable part of Indias snacking culture since its launch in 1995. With its irresistible taste, international and Indian flavours, Lays has established itself as a youth brand and continues to grow in the hearts and mind of its consumers. Lays is made with Indias best-quality fresh potatoes, simply sliced and cooked in edible vegetable oils, and then seasoned with delicious flavours! &lt;/p&gt;\r\n&lt;br&gt;&lt;br&gt;\r\n&lt;h4&gt;Ingredients&lt;/h4&gt;\r\n&lt;hr&gt;\r\n&lt;p&gt;Potato, Edible Vegetable Oil, Spices and (Onion Powder, Chilli Powder, Dry Mango Powder, Coriander Ginger Powder, Garlic powder, Black Pepper Powder, Turmeric Powder, Cumin), Salt, Black Salt, Sugar, (Tomato Powder Citric acid Tartaric acid.&lt;/p&gt;\r\n&lt;br&gt;&lt;br&gt;\r\n&lt;h4&gt;Oher Product info:&lt;/h4&gt;\r\n&lt;hr&gt;\r\n&lt;p&gt;\r\nPotato, Edible Vegetable Oil, Spices and (Onion Powder, Chilli Powder, Dry Mango Powder, Coriander Ginger Powder, Garlic powder, Black Pepper Powder, Turmeric Powder, Cumin), Salt, Black Salt, Sugar, (Tomato Powder Citric acid Tartaric acid. \r\n&lt;/p&gt;', 0, 20, 0, 0, 1, 10000, '2019-03-02 16:59:46'),
(37, 1, 6, 'Haldirams Instant Bhel', 'Haldiram Foods International Private Ltd,', 'product_images/thumb/87106977437bd2b1169ba467ccecd99e.jpg', 'product_images/full/10b9518ab95f8da8e6d5bdf650401513.jpg', '55 gm', 0, '&lt;h4&gt;About&lt;/h4&gt;\r\n&lt;hr&gt;\r\n&lt;p&gt;Our All Time Favourite.Amild Spicy Blend Of Chick Peas Lentils,Peanuts &amp; Puff Rice. &lt;/p&gt;\r\n&lt;br&gt;&lt;br&gt;\r\n&lt;h4&gt;Oher Product info:&lt;/h4&gt;\r\n&lt;hr&gt;\r\n&lt;p&gt;\r\nEAN Code: 8904004414493\r\nManufactured by: Haldiram Foods International Private Ltd, 20 Km Stone, Vill. Gumthala, Bhandara Road, Nagpur - 441104 (M.S.)\r\nBest before 21-05-2019\r\nFor Queries/Feedback/Complaints, Contact our Customer Care Executive at: Phone: 1860 123 1000 | Address: Innovative Retail Concepts Private Limited, No.18, 2nd &amp; 3rd Floor, 80 Feet Main Road, Koramangala 4th Block, Bangalore - 560034&lt;/p&gt;', 0, 10, 0, 0, 1, 59879, '2019-02-20 17:09:41'),
(38, 1, 6, 'Tasty Nuts', 'Haldiram Foods International Private Ltd.', 'product_images/thumb/eaf600d921893f00e419147b45fc7f08.jpg', 'product_images/full/3ac4de2278006ff0aede56b464216666.jpg', '150 gm', 0, '&lt;h4&gt;About&lt;/h4&gt;\r\n&lt;hr&gt;\r\n&lt;p&gt;Haldirams Tasty Nuts has got its store filled with delicious spices and sweets. Nuts are always finest in flavor and rich in nutrition\'s, since they have superior supply of dietary fiber including numerous B group vitamins. &lt;/p&gt;\r\n&lt;br&gt;&lt;br&gt;\r\n&lt;h4&gt;Ingrediants&lt;/h4&gt;\r\n&lt;hr&gt;&lt;p&gt;Peanuts (55%), Chick Peas Flour, Refined Palmolein Oil, Corn Starch, Salt, Red Chilli, Citric Acid (E330), Turmeric, Black Salt, Black Pepper, Dried Ginger Powder, Cardamom, Clove, Bay Leaves &amp; Nutmeg. Contain Peanut. May contain traces of Treenuts, Gluten &amp; Sesame Seed. &lt;/p&gt;&lt;br&gt;&lt;br&gt;\r\n&lt;h4&gt;Oher Product info:&lt;/h4&gt;\r\n&lt;hr&gt;\r\n&lt;p&gt;\r\nEAN Code: 8904040403640\r\nManufactured by: Haldiram Foods International Private Ltd, 20 Km Stone, Vill. Gumthala, Bhandara Road, Nagpur - 441104 (M.S.)\r\nBest before 21-05-2019\r\nFor Queries/Feedback/Complaints, Contact our Customer Care Executive at: Phone: 1860 123 1000 | Address: Supermarket Grocery Supplies Pvt Ltd. No7, Service Road, Domlur 100 Feet Road, Indiranagar, Bangalore 560071.&lt;/p&gt;', 0, 33, 0, 0, 1, 6596, '2019-03-02 16:59:23'),
(39, 1, 6, 'Khatta Meetha', 'Haldiram Foods International Private Ltd.', 'product_images/thumb/27406861d6823b72e50308584e14f66d.jpg', 'product_images/full/c7feec81bf99d9900a79d4c1a79d4da4.jpg', '150 gm', 0, '&lt;h4&gt;About&lt;/h4&gt;\r\n&lt;hr&gt;\r\n&lt;p&gt;Snacks are an important part of our routine, and having the right snack at the right time is a matter of getting a well deserved break when you most need it! Which is why you can trust Haldirams for an amazing range of sweet and savoury snacks that come in easy to carry packs, like the Haldirams Namkeen Khatta Meetha pouch. &lt;/p&gt;\r\n&lt;br&gt;&lt;br&gt;\r\n&lt;h4&gt;Ingrediants&lt;/h4&gt;\r\n&lt;hr&gt;&lt;p&gt;Haldirams Khatta Meetha savoury snack is a heady yet light weight concoction that contains seasoned rice flakes or puffed rice, as well as Bengal gram flour, turmeric, citric acid, vegetable oil, red lentils, chick peas, peanuts, sago and much more. Salt and sugar give it a sweet and tangy edge. &lt;/p&gt;&lt;br&gt;&lt;br&gt;\r\n&lt;h4&gt;How to use?&lt;/h4&gt;\r\n&lt;hr&gt;\r\n&lt;p&gt;This snack can be enjoyed anytime, anywhere. Open a pack when you have friends around and those munchies strike. Work it into your tea time routine for a subtle street food flavour. Also, enjoy it on the go with this easy to carry pack! &lt;/p&gt;\r\n&lt;br&gt;&lt;br&gt;\r\n&lt;h4&gt;Oher Product info:&lt;/h4&gt;\r\n&lt;hr&gt;\r\n&lt;p&gt;\r\nEAN Code: 8904004404425\r\nManufactured by: Haldiram Foods International Private Ltd, 20 Km Stone, Vill. Gumthala, Bhandara Road, Nagpur - 441104 (M.S.)\r\nBest before 21-05-2019\r\nFor Queries/Feedback/Complaints, Contact our Customer Care Executive at: Phone: 1860 123 1000 | Address: Innovative Retail Concepts Private Limited, No.18, 2nd &amp; 3rd Floor, 80 Feet Main Road, Koramangala 4th Block, Bangalore - 560034&lt;/p&gt;\r\n', 0, 30, 0, 0, 1, 25489, '2019-03-02 16:59:27'),
(40, 1, 6, 'Uncle chips Spicy Treat', 'Uncle chips', 'product_images/thumb/c84367a34f44ae91bcbcb39c99126237.jpg', 'product_images/full/f2e5116f222b3da728b65177c6477e1b.jpg', '55 gm', 0, '&lt;h4&gt;About&lt;/h4&gt;\r\n&lt;hr&gt;\r\n&lt;p&gt;Savor the classic taste of potatoes sprinkled with exotic spicy flavours. Relive all the fun and happy memories that have been made special with a bag of everyones favourite chips uncle chips. About the brand- Uncle Chipps is the heritage brand from PepsiCo. It is warm, playful, and traditional at heart, just like the good-natured uncle everyone in the family relates to and no family gathering is complete without!&lt;/p&gt;\r\n&lt;br&gt;&lt;br&gt;\r\n&lt;h4&gt;Ingrediants&lt;/h4&gt;\r\n&lt;hr&gt;&lt;p&gt;Potato, Edible Vegetable Oil, Milk Solids, Spice &amp; Condiments (Tamarind Powder, Onion Powder, Cumin Powder, Black Pepper Powder, Garlic Powder, Turmeric Powder,Large Cardamon Powder, Ginger Powder), Salt, Black Salt, Sugar, Citric Acid, Tartaric Acid.&lt;/p&gt;&lt;br&gt;&lt;br&gt;\r\n&lt;h4&gt;Nutirition&lt;/h4&gt;\r\n&lt;hr&gt;\r\n&lt;p&gt;(Approx) Per 100g, Energy kcal 554, Protein g 7.0, Carbohydrate g 52.7, Sugars g 1.3, Fat g 35.0.&lt;/p&gt;\r\n&lt;br&gt;&lt;br&gt;\r\n&lt;h4&gt;Oher Product info:&lt;/h4&gt;\r\n&lt;hr&gt;\r\n&lt;p&gt;\r\nEAN Code: 4015992\r\nManufacturer Name &amp; Address: Manufacturing unit address, see first two characters of batch no. and see below. BV: Badri Vishal Agro PVT. Ltd., Food park, 17-20, Industrial Area, Malanpur Bhind, gohad, Bhind, Madhya Pradesh 477177. JD M/S JDB Steel, Industrial Growth centre, Chatabari , Chaygaon, Distt. Kamrup 781123, Assam. AT - Atop Food Products Pvt. Ltd., Morbi- Rajkot Highway, Morbi, Pin 363341, Gujarat. MD MD printing and packaging private limited, plot no.49&amp;50, Sector 5, SIDCUL, Haridwar, Pin 249403, Uttrakhand. SK Shree krishan Co. (Manufacturers) Pvt. Ltd., Plot no.: F11, Near Tank no. 2 Kandua Food park, J.L No. 5, Mouza Kandua, P.S Sankrail, Howrah, Pin 711302, West Bengal.\r\nBest before 21-04-2019\r\nFor Queries/Feedback/Complaints, Contact our Customer Care Executive at: Phone: 1860 123 1000 | Address: Innovative Retail Concepts Private Limited, No.18, 2nd &amp; 3rd Floor, 80 Feet Main Road, Koramangala 4th Block, Bangalore - 560034&lt;/p&gt;', 0, 20, 0, 0, 1, 4589, '2019-02-21 05:29:31'),
(41, 1, 6, 'Banana Chips - Masala', 'Tierra Food India Pvt. Ltd.', 'product_images/thumb/84ca7de7a266b097a5548097045e7a7a.jpg', 'product_images/full/0f67bc28258ed58a145be5fb9a4d5d40.jpg', '100 gm', 0, '&lt;h4&gt;About&lt;/h4&gt;\r\n&lt;hr&gt;\r\n&lt;p&gt;Tasties Banana Chips is Kerala’s traditional snack made from fresh raw bananas. Tasties Banana chips are processed in a fully automated plant and available in your choice of exciting flavours .It is also healthier as it doesn’t contain Transfats. &lt;/p&gt;\r\n&lt;br&gt;&lt;br&gt;\r\n&lt;h4&gt;Ingrediants&lt;/h4&gt;\r\n&lt;hr&gt;&lt;p&gt;Raw Banana, Edible vegetable oil ( Refined Palmolein ), Maltodextrin, Salt, Sugar, Spices and Extracts, Anti caking agents{INS 551, INS341(iii)}, Fruit powder, Food acid(INS 330), Acidity Regulator(INS 262 i), Flavor enhancer (INS 627,INS 631), Emulsifying and stabilizing agent(INS 471), Anti Oxidant (INS 307) &lt;/p&gt;&lt;br&gt;&lt;br&gt;\r\n&lt;h4&gt;Oher Product info:&lt;/h4&gt;\r\n&lt;hr&gt;\r\n&lt;p&gt;\r\nEAN Code: 8904256710749\r\nFSSAI Number: 10015041000633\r\nManufacturer Name Address: Tierra Food India Pvt. Ltd., KINFRA Food Processing Park, Elamannoor P.O, Kerala -691525\r\nMarketed by: Bigbasket, Innovative Retail Concepts Private Limited, No.18, 2nd 3rd Floor, 80 Feet Main Road, Koramangala 4th Block, Bangalore - 560034\r\nBest before 22-05-2019\r\nFor Queries/Feedback/Complaints, Contact our Customer Care Executive at: Phone: 1860 123 1000 | Address: Innovative Retail Concepts Private Limited, No.18, 2nd 3rd Floor, 80 Feet Main Road, Koramangala 4th Block, Bangalore - 560034&lt;/p&gt;', 10, 59, 0, 0, 1, 5989, '2019-03-02 16:59:34'),
(42, 1, 6, 'Chatpata Matar', 'Haldiram Foods International Private Ltd.', 'product_images/thumb/a68942b884aae36f54f16b0529544efe.jpg', 'product_images/full/b597747979095c03f641d42ee1bd83e1.jpg', '22 gm', 0, '&lt;h4&gt;About&lt;/h4&gt;\r\n&lt;hr&gt;\r\n&lt;p&gt;Chatpata Matar is a peppery green peas snack. It arranged from the excellent quality of green peas. It is completed by frying cooked peas and seasoning them with spices like cumin, coriander and extra ingredients.&lt;/p&gt;\r\n&lt;br&gt;&lt;br&gt;\r\n&lt;h4&gt;Ingrediants&lt;/h4&gt;\r\n&lt;hr&gt;&lt;p&gt;Green Peas, Edible Vegetable Oil, Cumin Powder, Red Chilli Powder, Salt, Coriander Powder, Dry Mango Powder, Dry Ginger Powder, Black Pepper, Acidity Regulator &amp; Antioxidant (E330), Black Salt, Clove Powder, Cardamom, Cinnamon, Nutmeg, Bay Leaves &amp; Asafopetida CONTAINS PERMITTED SYNTHETIC FOOD COLOURS (E 102 &amp; E 133). May contain Peanut, Tree nuts, Gluten &amp; Sesame Seed. &lt;/p&gt;&lt;br&gt;&lt;br&gt;\r\n&lt;h4&gt;Oher Product info:&lt;/h4&gt;\r\n&lt;hr&gt;\r\n&lt;p&gt;\r\nEAN Code: 890400440860\r\nManufactured by: Haldiram Foods International Private Ltd, 20 Km Stone, Vill. Gumthala, Bhandara Road, Nagpur - 441104 (M.S.)\r\nBest before 22-05-2019\r\nFor Queries/Feedback/Complaints, Contact our Customer Care Executive at: Phone: 1860 123 1000 | Address: Innovative Retail Concepts Private Limited, No.18, 2nd &amp; 3rd Floor, 80 Feet Main Road, Koramangala 4th Block, Bangalore - 560034&lt;/p&gt;', 0, 5, 0, 0, 1, 56900, '2019-03-02 16:59:38'),
(43, 1, 9, 'Gulab Jamun', 'Haldiram Foods International Private Ltd.', 'product_images/thumb/bb84dacf60d2f3830aec5f3695c90733.jpg', 'product_images/full/737dbe2f9b494c107c807497727c5e28.jpg', '1 kg', 0, '&lt;h4&gt;About&lt;/h4&gt;\r\n&lt;hr&gt;\r\n&lt;p id=\'prod_abt_desc\'&gt;Gulab Jamun is a popular North Indian mithai or sweet, commonly served as a dessert after a meal. This classic small sweet balls or sweet dumplings are made from flour, sugar and chhena (Indian cottage cheese) and fried before they are dipped luxuriously in sweetened sugary syrup. A tin of Haldirams Gulab Jamun is pure sinful delight, and is normally bought or presented to mark an auspicious occasion at home such as weddings or festivals. t&lt;/p&gt;\r\n&lt;br&gt;&lt;br&gt;\r\n&lt;h4&gt;Ingredients&lt;/h4&gt;&lt;hr&gt;\r\n&lt;p&gt;\r\nHaldiram’s iconic Gulab Jamuns are made of sugar, water, khoya, chhena, wheat flour, ghee, rose water &amp; cardamom. This is a vegetarian sweet and liked by people of all ages. &lt;/p&gt;&lt;br&gt;&lt;br&gt;\r\n&lt;h4&gt;How to Use?&lt;/h4&gt;\r\n&lt;hr&gt;\r\n&lt;p&gt;Any wedding or festivals like Diwali will be incomplete without a serving of Gulab Jamun. This can serve as a perfect gift for someone you love during festivals, because gifting sweets and savouries are common. It is said that Gulab Jamun served hot and dipped in sugar sauce is a sinful delicacy which cannot be resisted under any circumstance. &lt;/p&gt;\r\n&lt;br&gt;&lt;br&gt;\r\n&lt;h4&gt;Other Product Info:&lt;/h4&gt;\r\n&lt;hr&gt;\r\n&lt;p&gt;EAN Code: 8904004405910\r\nManufactured by: Haldiram Foods International Private Ltd, 20 Km Stone, Vill. Gumthala, Bhandara Road, Nagpur - 441104 (M.S.)\r\nBest before 01-09-2019\r\nFor Queries/Feedback/Complaints, Contact our Customer Care Executive at: Phone: 1860 123 1000 | Address: Supermarket Grocery Supplies Pvt Ltd. No7, Service Road, Domlur 100 Feet Road, Indiranagar, Bangalore 560071. | Email: customerservice@bigbasket.com &lt;/p&gt;\r\n&lt;br&gt;&lt;br&gt;', 2, 190, 0, 0, 1, 2000, '2019-03-02 16:58:52'),
(44, 1, 9, 'Soan Papdi', 'Haldiram Foods International Private Ltd.', 'product_images/thumb/469a4110511722728bd272204c61876a.jpg', 'product_images/full/319cfc29aa7b41dc480c6647f48134b8.jpg', '250 gm', 0, '&lt;h4&gt;About&lt;/h4&gt;\r\n&lt;hr&gt;\r\n&lt;p&gt;\r\nTraditional Indian Flakey Sweet Made Of Gram And Mixed With Dry Fruit. \r\n&lt;/p&gt;&lt;br&gt;&lt;br&gt;\r\n&lt;h4&gt;Ingredients&lt;/h4&gt;&lt;hr&gt;\r\n&lt;p&gt;\r\nSugar, Refined Palmolein Oil, Wheat Flour, Chick Peas Flour, Almond, Pistachio &amp; Cardamomcontains Almond, Pistachio &amp; Gluten May Contain Other Tree Nuts &amp; Milk. \r\n&lt;/p&gt;&lt;br&gt;&lt;br&gt;\r\n&lt;h4&gt;Other Product Info&lt;/h4&gt;\r\n&lt;hr&gt;\r\n&lt;p&gt;\r\nEAN Code: 8906005503268\r\nManufactured by: Haldiram Foods International Private Ltd, 20 Km Stone, Vill. Gumthala, Bhandara Road, Nagpur - 441104 (M.S.)\r\nBest before 31-05-2019\r\nFor Queries/Feedback/Complaints, Contact our Customer Care Executive at: Phone: 1860 123 1000 | Address: Supermarket Grocery Supplies Pvt Ltd. No7, Service Road, Domlur 100 Feet Road, Indiranagar, Bangalore 560071. | Email: customerservice@bigbasket.com \r\n&lt;/p&gt;\r\n', 0, 65, 0, 0, 1, 5600, '2019-03-02 16:58:56'),
(45, 1, 9, 'Rasmalai', 'Haldiram Foods International Private Ltd.', 'product_images/thumb/82a940cbc77d02270bb453bc43a899de.jpg', 'product_images/full/753ca9595bcc5517346fadb7684e74fb.jpg', '1 kg', 0, '&lt;h4&gt;About&lt;/h4&gt;\r\n&lt;hr&gt;&lt;p id=&quot;prod_abt_desc&quot;&gt;Haldirams Rasmalai is a well-known milk-based dessert of India. This dessert is rich in its texture. It will melt in your mouth. To like Rasmalai, remove the sugar syrup from the can, and transfer the rasmalai to a bowl of sugared, chilled milk. Garnish with almonds, pistachios and additional dry fruits. Serve cold. &lt;/p&gt;&lt;br&gt;&lt;br&gt;\r\n&lt;h4&gt;Ingredients&lt;/h4&gt;&lt;hr&gt;&lt;p&gt;Sugar, Water, Milk Solids (Chhanna), Rose Water &amp; Preservative (E 224), Contains Milk &amp; Sulphite, May Contain Gluten. &lt;/p&gt;&lt;br&gt;&lt;br&gt;\r\n&lt;h4&gt;Other Product Info&lt;/h4&gt;\r\n&lt;p&gt;EAN Code: 8904004407723\r\nManufactured by: Haldiram Foods International Private Ltd, 20 Km Stone, Vill. Gumthala, Bhandara Road, Nagpur - 441104 (M.S.)\r\nBest before 01-09-2019\r\nFor Queries/Feedback/Complaints, Contact our Customer Care Executive at: Phone: 1860 123 1000 | Address: Innovative Retail Concepts Private Limited, No.18, 2nd &amp; 3rd Floor, 80 Feet Main Road, Koramangala 4th Block, Bangalore - 560034 | Email: customerservice@bigbasket.com &lt;/p&gt;\r\n', 0, 185, 0, 0, 1, 599, '2019-03-02 16:59:00'),
(46, 1, 9, 'Nandini Badam Burfi', 'Karnataka Co-Operative Milk Producer\'S Federation Limited ', 'product_images/thumb/5a7508e17355f5cb2fc8ea0d4e88db7c.jpg', 'product_images/full/675d4c184db4cf5ec81bb7a3998aed6e.jpg', '250 gm', 0, '&lt;h4&gt;About&lt;/h4&gt;\r\n&lt;hr&gt;\r\n&lt;p id=&quot;prod_abt_desc&quot;&gt;\r\nNandhini Badam Barfi is certainly unadulterated comfort. It is prepared of pure and healthy almond paste cooked apparently in sugar syrup, with a mild flavoring of cardamom. It offer flexible texture and rich flavor make it mouth-watering. &lt;/p&gt;\r\n&lt;br&gt;&lt;br&gt;\r\n&lt;h4&gt;Nutritional Facts&lt;/h4&gt;&lt;hr&gt;&lt;p&gt;\r\n(per 17 g) Calories 66 Calories from Fat 31 Total Fat 3.5 g Saturated Fat 0.5 g Polyunsaturated Fat 1 g Monounsaturated Fat 2 g Cholesterol 2 mg Sodium 22 mg Potassium 48 mg Carbohydrates 7.5 g Dietary Fiber 0.5 g Sugars 7 g Protein 1.5 g &lt;/p&gt;&lt;br&gt;&lt;br&gt;\r\n&lt;h4&gt;Other Product Info&lt;/h4&gt;&lt;hr&gt;\r\n&lt;p&gt;EAN Code: 273075\r\nManufactured &amp; Marketed by: Karnataka Co-Operative Milk Producer\'S Federation Limited\r\nBest before 8 days from the date of delivery\r\nFor Queries/Feedback/Complaints, Contact our Customer Care Executive at: Phone: 1860 123 1000 | Address: Supermarket Grocery Supplies Pvt Ltd. No7, Service Road, Domlur 100 Feet Road, Indiranagar, Bangalore 560071. | Email: customerservice@bigbasket.com \r\n&lt;/p&gt;', 0, 160, 0, 0, 1, 2600, '2019-03-02 16:49:50'),
(47, 1, 9, 'Brown Rassogolla', 'Bikalananda Kars Sweet', 'product_images/thumb/40460793ffa99373ef566ef1a4a553cf.jpg', 'product_images/full/2559b32bcd57702f60de2ad843bec235.jpg', '900 gm', 0, '&lt;h4&gt;About&lt;/h4&gt;\r\n&lt;hr&gt;&lt;p id=&quot;prod_abt_desc&quot;&gt;\r\nThe famous, iconic and legendary - Bikalanand Kar from Cuttacks Brown Rossogolla, called theKheer Mohan, is unique, healthy and not exactly a Rosogulla. It can now be delivered straight to your doorsteps! Savour the authentic, soft and spongy Kheer Mohan from Cuttack &lt;/p&gt;\r\n&lt;br&gt;&lt;br&gt;\r\n&lt;h4&gt;Ingredients&lt;/h4&gt;\r\n&lt;hr&gt;&lt;p&gt;Sugar syrup, cow milk casein (chhana), minerals, vitamins, preservatives (INS 224, 234) \r\n&lt;/p&gt;\r\n&lt;br&gt;&lt;br&gt;\r\n&lt;h4&gt;How to use?&lt;/h4&gt;\r\n&lt;hr&gt;&lt;p&gt;Kheer Mohan is light, Soft and spongy sweet like a Rossogulla from Cuttack.&lt;/p&gt;&lt;br&gt;&lt;br&gt;\r\n&lt;h4&gt;Other Product Info&lt;/h4&gt;&lt;hr&gt;&lt;p&gt;For Queries/Feedback/Complaints, Contact our Customer Care Executive at: Phone: 1860 123 1000 | Address: Innovative Retail Concepts Private Limited, No.18, 2nd &amp; 3rd Floor, 80 Feet Main Road, Koramangala 4th Block, Bangalore - 560034 | Email: customerservice@bigbasket.com &lt;/p&gt;&lt;br&gt;&lt;br&gt;', 0, 210, 0, 0, 1, 3000, '2019-03-02 16:53:48'),
(50, 1, 9, 'Cashew Burfi', 'Karnataka Co-Operative Milk Producer\'S Federation Limited', 'product_images/thumb/92752b1858fb7c2c978f7c94165045fe.jpg', 'product_images/full/c60cba314ea749315921848107d4d40b.jpg', '250 gm', 0, '&lt;h4&gt;About&lt;/h4&gt;\r\n&lt;hr&gt;&lt;p id=&quot;prod_abt_desc&quot;&gt;\r\nNandini Premium Cashew Burfi: Ingredients: Milk Solids, Cashew, Cane Sugar \r\n&lt;/p&gt;\r\n&lt;br&gt;&lt;br&gt;\r\n&lt;h4&gt;Nutritional Information&lt;/h4&gt;&lt;hr&gt;&lt;p&gt;\r\nNutritional Information: Per 1g, Energy 378 Kcal, Total Carbohydrates 53.9g, of Which Sugars 4.g, Total Fat 11.2g, Saturated Fat 7.4g, Cholesterol 29 mg, Proteins 15.3, Calcium 1mg, Vitamin A 128Ug. &lt;/p&gt;&lt;br&gt;&lt;br&gt;\r\n&lt;h4&gt;Other Product Info&lt;/h4&gt;&lt;hr&gt;\r\n&lt;p&gt;\r\nEAN Code: 8906036672100\r\nManufactured &amp; Marketed by: Karnataka Co-Operative Milk Producer\'S Federation Limited\r\nBest before 12-03-2019\r\nFor Queries/Feedback/Complaints, Contact our Customer Care Executive at: Phone: 1860 123 1000 | Address: Innovative Retail Concepts Private Limited, No.18, 2nd &amp; 3rd Floor, 80 Feet Main Road, Koramangala 4th Block, Bangalore - 560034 | Email: customerservice@bigbasket.com \r\n&lt;/p&gt;', 0, 170, 0, 0, 1, 2310, '2019-03-02 16:57:42'),
(51, 2, 61, 'Himalaya Nourishing Body Lotion', 'Himalaya', 'product_images/thumb/246e8887e86d7fa1518e9bf0e086c395.jpg', 'product_images/full/b3b0be24add50d65e50069f271757b61.jpg', '100 ml', 0, '&lt;h4&gt;About the Product&lt;/h4&gt;\r\n&lt;hr&gt;\r\n&lt;p id=&quot;prod_abt_desc&quot;&gt;Himalaya\'s Nourishing Body Lotion combines 100% herbal actives to restore your body\'s water content Himalaya\'s Nourishing Body Lotion combines 100% herbal actives to restore your body\'s water content as varying weather conditions make skin lose its moisture. The non-greasy body lotion leaves skin feeling soft, supple and toned. Blended with all-natural ingredients such as Aloe Vera and Winter Cherry, which are known for their intense hydrating properties, our body lotion deeply penetrates into the skin to moisturize it fully.&lt;/p&gt;\r\n&lt;br&gt;&lt;br&gt;\r\n&lt;h4&gt;Other Product Info&lt;/h4&gt;\r\n&lt;hr&gt;\r\n&lt;p&gt;\r\nEAN Code: __EAN __ \r\nBest Before 12-04-2021 \r\nFor Queries/Feedback/Complaints, Contact our Customer Care Executive at: Phone: 1860 123 1000 | Address: Innovative Retail Concepts Private Limited, Ranka Junction 4th Floor, Tin Factory bus stop. KR Puram, Bangalore - 560016 Email:customerservice@bigbasket.com\r\n&lt;/p&gt;&lt;br&gt;&lt;br&gt;\r\n&lt;h4&gt;How to Use ?&lt;/h4&gt;\r\n&lt;hr&gt;\r\n&lt;p&gt;\r\n&lt;li&gt;Apply Nourishing Body Lotion gently all over the body, with special attention to severely dry areas, slowly massaging it in.&lt;/li&gt;\r\n&lt;li&gt;Best used after bathing when your skin is most receptive to hydration.&lt;/li&gt;\r\n&lt;/p&gt;&lt;br&gt;&lt;br&gt;\r\n&lt;h4&gt;Composition&lt;/h4&gt;\r\n&lt;hr&gt;\r\n&lt;p&gt;\r\n&lt;strong&gt;Aloe Vera:&lt;/strong&gt; It is known for its many healing properties, is rich in polysaccharides and nutrients which exhibit antibacterial and antifungal action. A natural UV inhibitor, its hydrating, softening and intense moisturizing properties nourish the skin.&lt;br&gt;\r\n&lt;strong&gt;Winter Cherry:&lt;/strong&gt; It is an effective anti-stress agent. In skincare, this plant is used for its antioxidant action, which helps skin cell regeneration and softens skin.\r\n&lt;/p&gt;&lt;br&gt;&lt;br&gt;', 25, 75, 0, 0, 1, 1000, '2019-10-20 15:17:17');

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE `settings` (
  `id` int(11) NOT NULL,
  `logo` varchar(255) NOT NULL,
  `favicon` varchar(255) NOT NULL,
  `footer_about` text NOT NULL,
  `footer_copyright` text NOT NULL,
  `contact_address` text NOT NULL,
  `contact_email` varchar(255) NOT NULL,
  `contact_phone` varchar(255) NOT NULL,
  `contact_map_iframe` text NOT NULL,
  `receive_email` varchar(255) NOT NULL,
  `receive_email_subject` varchar(255) NOT NULL,
  `receive_email_thank_you_message` text NOT NULL,
  `forget_password_message` text NOT NULL,
  `meta_title_home` text NOT NULL,
  `meta_keyword_home` text NOT NULL,
  `meta_description_home` text NOT NULL,
  `smtp_host` text NOT NULL,
  `smtp_port` int(11) NOT NULL,
  `smtp_user` text NOT NULL,
  `smtp_pass` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`id`, `logo`, `favicon`, `footer_about`, `footer_copyright`, `contact_address`, `contact_email`, `contact_phone`, `contact_map_iframe`, `receive_email`, `receive_email_subject`, `receive_email_thank_you_message`, `forget_password_message`, `meta_title_home`, `meta_keyword_home`, `meta_description_home`, `smtp_host`, `smtp_port`, `smtp_user`, `smtp_pass`) VALUES
(2, 'assets/icon/logo.png', 'assets/icon/favicon.ico', '', '&copy;  2020 BigGrocery. All Rights Reserved. | Designed and Developed by Kartik Chaudhari', 'Chandkheda, Ahmedabad', 'biggrocery@gmail.com', '+91 123456897', 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3669.7310192080677!2d72.59273001432722!3d23.106940384910448!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x395e83c959d4de6f%3A0x748d0828c02cf9fa!2sVishwakarma%20Government%20Engineering%20College!5e0!3m2!1sen!2sin!4v1574746060950!5m2!1sen!2sin', '', 'Visitor Email Message from Ecommerce Website', 'Thank you for sending email. We will contact you shortly.', 'A confirmation link is sent to your email address. You will get the password reset information in there.', 'BigGrocery - Your own online gorcery store', 'Buy Grocery Online, Online Grocery, Grocery Store, Online Grocery Shopping, Online Grocery Store, Online Supermarket, Free Delivery, Great Offers, Best Prices', 'Online Grocery Shopping : Choose from a wide range of grocery, baby care products, personal care products, fresh fruits &amp; vegetables online. Pay Online &amp; Avail exclusive discounts on various products @ India&#x27;s Best Online Grocery store.', '#', 465, '#', '#');

-- --------------------------------------------------------

--
-- Table structure for table `store_setting`
--

CREATE TABLE `store_setting` (
  `setting_id` int(11) NOT NULL,
  `store_address` text NOT NULL,
  `store_email` varchar(200) NOT NULL,
  `store_contact` varchar(12) NOT NULL,
  `store_social_links` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `store_setting`
--

INSERT INTO `store_setting` (`setting_id`, `store_address`, `store_email`, `store_contact`, `store_social_links`) VALUES
(1, 'Ahmadabad, Chandkheda', 'biggrocery@gmail.com', '1234567890', '');

-- --------------------------------------------------------

--
-- Table structure for table `sub_categories`
--

CREATE TABLE `sub_categories` (
  `sub_cat_id` int(11) NOT NULL,
  `sub_cat_name` varchar(200) NOT NULL,
  `cat_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sub_categories`
--

INSERT INTO `sub_categories` (`sub_cat_id`, `sub_cat_name`, `cat_id`) VALUES
(1, 'Water & Beverages', 1),
(2, 'Fruits & Vegetables', 1),
(3, 'Staples', 1),
(4, 'Branded Food', 1),
(5, 'Breakfast & Cereal', 1),
(6, 'Snacks', 1),
(7, 'Spices', 1),
(8, 'Biscuit & Cookie', 1),
(9, 'Sweets', 1),
(43, 'Beauty & Skin care', 2),
(54, 'Ayurvedic', 2),
(55, 'Baby Care', 2),
(56, 'Cosmetics', 2),
(57, 'Deo & Purfumes', 2),
(58, 'Hair Care', 2),
(59, 'Oral Care', 2),
(60, 'Personal Hygiene', 2),
(61, 'Skin care', 2),
(62, 'Fashion Accessories', 2),
(63, 'Grooming Tools', 2),
(64, 'Shaving Needs', 2),
(65, 'Sanitary Needs', 2),
(66, 'Cleaning Accessories', 3),
(67, 'CookWear', 3),
(68, 'Detergents', 3),
(69, 'Gardening Needs', 3),
(70, 'Kitchen & Dining', 3),
(71, 'Kitchen Wear', 3),
(72, 'Pet Care', 3),
(73, 'Plastic Wear', 3),
(74, 'Pooja Needs', 3),
(75, 'Serve ware', 3),
(76, 'Safety Accessories', 3),
(77, 'Festive Decoratives', 3),
(78, 'Pickle & Condiment', 3),
(79, 'Instant Food', 3),
(80, 'Dry Fruit', 3),
(81, 'Tea & Coffee', 3);

-- --------------------------------------------------------

--
-- Table structure for table `tokens`
--

CREATE TABLE `tokens` (
  `id` int(11) NOT NULL,
  `token` varchar(255) NOT NULL,
  `user_id` int(10) NOT NULL,
  `created` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tokens`
--

INSERT INTO `tokens` (`id`, `token`, `user_id`, `created`) VALUES
(26, 'd7bc5bfe74d84d87258d6832fcaacf', 5, '2019-11-07'),
(27, 'b9329506f7e09bf7589d1f9d81dca5', 5, '2019-11-07'),
(28, '25b8236239feb403e354666bda54ba', 5, '2019-11-07'),
(29, 'f3d6f89302badcf0114c839f11d243', 5, '2019-11-26'),
(30, '1f16a510b43a28af17d54448df81b8', 5, '2019-11-26'),
(31, '8935d1306ec4e9810c8bee17315faf', 5, '2019-11-26'),
(32, '418adb0a12565f88a7b3356cb83aa4', 5, '2019-11-26'),
(33, '587730c0ed62d2b49df5f270dbab1c', 5, '2019-11-26'),
(34, '5dafe2a7bb8161b05166b072ce213a', 5, '2019-11-26'),
(35, 'd21e2c7b9aebec5f69f43a42ad6bf4', 5, '2019-11-26'),
(36, '5b8340604050d62efd393c13c66c7e', 5, '2019-11-26'),
(37, '3284d54c4c7b2948c54d5821737abf', 5, '2019-11-26'),
(38, 'e4e2090cdb16f3759564c38ea0ab8c', 5, '2019-11-26'),
(39, '06e69d2e4c7c630f941a39cea53e3b', 5, '2020-02-17');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `fname` varchar(150) DEFAULT NULL,
  `lname` varchar(150) DEFAULT NULL,
  `email` varchar(250) DEFAULT NULL,
  `contact` varchar(10) DEFAULT NULL,
  `password` varchar(300) DEFAULT NULL,
  `avatar` varchar(300) NOT NULL,
  `delivery_address` text,
  `address` text,
  `date_creation` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

-- --------------------------------------------------------

--
-- Table structure for table `wishlist`
--

CREATE TABLE `wishlist` (
  `wish_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `wishlist`
--

INSERT INTO `wishlist` (`wish_id`, `product_id`, `user_id`) VALUES
(1, 1, 1),
(2, 1, 1),
(3, 2, 2),
(4, 3, 3),
(5, 4, 4),
(9, 25, 5),
(10, 1, 11),
(11, 35, 11),
(12, 36, 11),
(13, 38, 11),
(14, 42, 11),
(15, 41, 11),
(16, 40, 11),
(17, 51, 7),
(18, 19, 14);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `ad_banner`
--
ALTER TABLE `ad_banner`
  ADD PRIMARY KEY (`banner_id`);

--
-- Indexes for table `ad_banner_image`
--
ALTER TABLE `ad_banner_image`
  ADD PRIMARY KEY (`banner_img_id`);

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`cart_id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`cat_id`);

--
-- Indexes for table `offers`
--
ALTER TABLE `offers`
  ADD PRIMARY KEY (`offer_id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`order_id`);

--
-- Indexes for table `payments`
--
ALTER TABLE `payments`
  ADD PRIMARY KEY (`payment_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`product_id`),
  ADD KEY `FK_SUB_CAT_ID` (`sub_cat_id`);

--
-- Indexes for table `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `store_setting`
--
ALTER TABLE `store_setting`
  ADD PRIMARY KEY (`setting_id`);

--
-- Indexes for table `sub_categories`
--
ALTER TABLE `sub_categories`
  ADD PRIMARY KEY (`sub_cat_id`);

--
-- Indexes for table `tokens`
--
ALTER TABLE `tokens`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `wishlist`
--
ALTER TABLE `wishlist`
  ADD PRIMARY KEY (`wish_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `ad_banner`
--
ALTER TABLE `ad_banner`
  MODIFY `banner_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `ad_banner_image`
--
ALTER TABLE `ad_banner_image`
  MODIFY `banner_img_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `cart_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=99;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `cat_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `offers`
--
ALTER TABLE `offers`
  MODIFY `offer_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `payments`
--
ALTER TABLE `payments`
  MODIFY `payment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=131;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;

--
-- AUTO_INCREMENT for table `settings`
--
ALTER TABLE `settings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `store_setting`
--
ALTER TABLE `store_setting`
  MODIFY `setting_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `sub_categories`
--
ALTER TABLE `sub_categories`
  MODIFY `sub_cat_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=82;

--
-- AUTO_INCREMENT for table `tokens`
--
ALTER TABLE `tokens`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `wishlist`
--
ALTER TABLE `wishlist`
  MODIFY `wish_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `FK_SUB_CAT_ID` FOREIGN KEY (`sub_cat_id`) REFERENCES `sub_categories` (`sub_cat_id`) ON DELETE CASCADE ON UPDATE NO ACTION;

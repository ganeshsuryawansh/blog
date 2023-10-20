-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 20, 2023 at 06:35 PM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 7.3.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `blog`
--

-- --------------------------------------------------------

--
-- Table structure for table `blog_admins`
--

CREATE TABLE `blog_admins` (
  `admin_id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `blog_admins`
--

INSERT INTO `blog_admins` (`admin_id`, `name`, `email`, `password`) VALUES
(1, 'ganesh', 'ganesh@gmail.com', '4545');

-- --------------------------------------------------------

--
-- Table structure for table `blog_posts`
--

CREATE TABLE `blog_posts` (
  `post_id` int(11) NOT NULL,
  `post_title` varchar(1000) DEFAULT NULL,
  `post_content` text NOT NULL,
  `post_content2` varchar(5000) DEFAULT NULL,
  `post_content3` varchar(5000) DEFAULT NULL,
  `post_image` longblob DEFAULT NULL,
  `date` datetime NOT NULL DEFAULT current_timestamp(),
  `emailid` varchar(50) NOT NULL,
  `post_cat` int(50) NOT NULL,
  `post_image2` varchar(1000) DEFAULT NULL,
  `post_image3` varchar(1000) DEFAULT NULL,
  `likes` int(100) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `blog_posts`
--

INSERT INTO `blog_posts` (`post_id`, `post_title`, `post_content`, `post_content2`, `post_content3`, `post_image`, `date`, `emailid`, `post_cat`, `post_image2`, `post_image3`, `likes`) VALUES
(1, 'What is a Lifestyle If you want your thoughts and ', 'Lifestyle blogs are magazine-like websites that share and promote daily life experiences and perspectives from an individual or group of like-minded people.', 'If you want your thoughts and ideas to be heard, an exclusive blog platform provides a terrific forum for you to explore your passions while sharing your unique personality with others.\n\nBut wait. (That’s not all!)\n\nThere’s a second element to lifestyle blogging that sweetens the deal!\n\nLifestyle blogs provide opportunities to draw some passive income while writing about activities and things you already love.', 'There are several creative ways to monetize a blog.\r\n\r\nMost commonly, lifestyle blogs make money by advertising brands that align and resonate with the lifestyle they promote.\r\n\r\nLifestyle influencers (bloggers with large, engaged audiences) collaborate with brands through sponsor networks (like Activate or Social Fabric) and receive compensation for writing and publishing sponsored posts that review and recommend products to their readers.', 0x6c6966657374796c652d626c6f67732d3730302e6a7067, '2023-02-27 21:06:00', 'gs@gmail.com', 1, 'lifestyle-blogs-700.jpg', 'lifestyle-blogs-700.jpg', 23),
(2, 'THE BENEFITS OF VITAMIN C-RICH FOODS', 'Vitamin C is an essential nutrient that our bodies can’t produce on their own, which means we need to make sure we get enough of this vitamin on a ...', 'Vitamin C is an essential nutrient that our bodies can’t produce on their own, which means we need to make sure we get enough of this vitamin on a ...', 'Vitamin C is an essential nutrient that our bodies can’t produce on their own, which means we need to make sure we get enough of this vitamin on a ...', 0x766974616d696e5f635f666f6f64735f383030782e706e67, '2023-02-27 21:56:44', 'gs@gmail.com', 3, 'mango_1024x1024.png', 'mango_1024x1024.png', 0),
(3, 'WHERE TO STAY IN SINGAPORE: THE BEST NEIGHBORHOODS', 'Home to some 5.7 million people, Singapore is a cosmopolitan city-state that separated from the British in 1963 and gained independence from Malaysia in 1965. In the decades that followed, it evolved from a low-income country to one of the centers of world finance.', 'It’s a foodie’s dream, bursting with tasty hawker-stall offerings, delicious Indian cuisine, and fresh seafood. In fact, some of the cheapest Michelin-starred eateries in the world can be found here.', 'For more active visitors, there are hiking trails on which you can stretch your legs, numerous cycling paths, and plenty of kayaking adventures to be had. And when you run out of energy, there are beaches for chilling out and soaking up the sun', 0x7768657265746f7374617973696e6761706f72652e6a7067, '2023-02-27 22:02:21', 'gs@gmail.com', 4, 'wheretostaysingapore.jpg', 'wheretostaysingapore.jpg', 1),
(4, 'What is lasagna soup?', 'Lasagna soup is exactly what it sounds like, lasagna in soup form! It’s all the amazing things about lasagna without the layering and time commitment. And best of all is the fact that you can eat it in a bowl with a spoon. It’s always lasagna soup season!', 'Lasagna soup is trending on Tiktok right now thanks to SZA and @dannylovespasta. SZA saw him making lasagna soup and asked him to drop the recipe, which he did of course! His lasagna soup doesn’t differ too much from mine, but if you want to make his exact recipe, just like SZA did, here it is:', '1 onion, chopped\r\n2 cloves garlic, minced\r\n1/2 lb ground beef\r\n1/2 lb Italian sausage\r\n1/4 tsp chili pepper flakes\r\n1/2 tsp dried oregano\r\n2 tbsp tomato paste\r\n2 cups marinara sauce\r\n3 cups chicken broth\r\n1/2 cup heavy cream\r\n1/2 box lasagna noodles, broken\r\n1 cup shredded mozzarella\r\n1/2 cup shredded parmesan\r\n1/4 cup fresh basil, chopped', 0x656173792d73746f7665746f702d6c617361676e612d736f75702d7265636970652d30303639772d3230343878313336362e706e67, '2023-02-27 22:06:22', 'gs@gmail.com', 5, 'easy-stovetop-lasagna-soup-recipe-0069w-2048x1366.png', 'easy-stovetop-lasagna-soup-recipe-0069w-2048x1366.png', 1),
(5, 'Free trial + up to 60% off 🧒  5 Positive Parenting', 'Positive parenting phrases can help children thrive by encouraging their curiosity and personal development! This style of parenting is based on clear expectations, consistency and reliability, and affection and appreciation. With positive parenting, you can better understand your child’s individuality and boost their confidence. ', 'While every family knows what’s best when it comes to their children and their parenting style, here are some phrases to use with your child if you’re interested in implementing positive parenting in your daily routine!\r\n\r\n ', 'Taking the focus away from the outcome of your child’s efforts (winning a game or getting a perfect score) helps them recognize that their worth isn’t defined by winning or losing.\r\n\r\nIn this example, children see that they can earn praise and positive outcomes by trying hard! ', 0x706f7369746976652d706172656e74696e672d706872617365732d312d7131746530707864317930386e3536623974617234716565757a35327a646a77617532706d6638396d6f2e6a7067, '2023-02-27 22:09:36', 'gs@gmail.com', 6, 'positive-parenting-phrases-1-q1te0pxd1y08n56b9tar4qeeuz52zdjwau2pmf89mo.jpg', 'positive-parenting-phrases-1-q1te0pxd1y08n56b9tar4qeeuz52zdjwau2pmf89mo.jpg', 3),
(6, 'Top 4 Websites For Online Festive Sales 2022', 'Indian shopping sites are notorious for launching sales with the lowest prices on electronics, fashion, appliances, home decor, kitchen essentials, mobile phones, laptops, beauty, makeup, shoes, ethnic wear, etc. The giants of the e-commerce industry never fail to impress the masses with jaw-dropping offers and sales during the festive season. ', 'Ganesh Chaturthi is the festival marking the birth of Ganesha - the god of wisdom, new beginnings, prosperity and fortune. Characterized by pomp and grandeur, it is a ten-day festival celebrated not only in India but across the globe', 'The wedding season brings a lot of excitement about getting together, family, events, feasts, and shopping. As grand as Indian weddings are, the clothes are also on par with the standard. Opting for what your favourite celeb wore can be a choice, while some may prefer a striking designer piece for their big day.', 0x6f6e6c696e652d73686f7070696e672d696e6469616e2d666573746976616c2d73616c65732d6f66666572732e6a7067, '2023-02-27 22:19:18', 'gs@gmail.com', 2, 'online-shopping-indian-festival-sales-offers.jpg', 'shopping-onam-best-products-traditional-celebration.jpg', 2),
(13, 'Weekly Market Highlights', 'Macro / TradFi\r\nInflation in the Eurozone exceeded expectations, coming in at 8.6% for Feb vs expectations of 8.2%. Germany, France and Spain all saw higher inflation figures in Feb, compared to Jan, increasing expectations of continued rate increases from the European Central Bank.', 'A second Ethereum testnet (Sepolia) successfully simulated the upcoming Shanghai hard fork, which will allow withdrawals of staked ETH. The final testnet (Goerli) is expected on March 14, followed by the mainnet upgrade, which is scheduled for early April.\r\nScroll, the upcoming Ethereum zkEVM, announced its Pre-Alpha testnet. This is the first opportunity for external testers, including early users and devs, to interact with Scroll.', 'Chiliz, the Web3 sports token platform, is set to start a US$50M incubator to invest in early-stage sports and entertainment projects building on the Chiliz L1 chain.', 0x323032312d30332d3234543233303332325a5f3535323534323032375f5243325a484d394a495631465f5254524d4144505f335f43525950544f2d43555252454e43592d464944454c4954595f313631363737383235393238385f313631363737383838313539312e706e67, '2023-03-06 14:53:37', 'gs@gmail.com', 7, '2021-03-24T230322Z_552542027_RC2ZHM9JIV1F_RTRMADP_3_CRYPTO-CURRENCY-FIDELITY_1616778259288_1616778881591.png', '2021-03-24T230322Z_552542027_RC2ZHM9JIV1F_RTRMADP_3_CRYPTO-CURRENCY-FIDELITY_1616778259288_1616778881591.png', 1),
(135, 'What Type Of Media Can You Add To Make A Blog Post', 'If your blogs aren’t converting due to static content, you need to add multimedia elements like videos, images, infographics, GIFs, etc. in to create an interesting blog post.\r\nAre your blogs not converting the way you would like them to? Want to learn about how to make blogs more interesting and increase reader engagement? This detailed guide will give you some innovative ideas to help your blog look engaging and drive sales. ', 'It is important to note that most people visit blogs and usually leave without reading a particular post completely. Bloggers or brands just have a couple of seconds to grab the readers’ attention, convince them and let them read the content in their blog. \r\nSo how do you ensure that your content marketing efforts for your blog aren’t going to waste? First, you add media elements to your blog, making the content stand out from the crowd. Multimedia content adds voice to the content, and readers can interact better.\r\n\r\n', 'Continue reading below to learn about the different media elements you can embed in your blog to create an interesting blog post that ranks your blog higher in search engine results. ', 0x6d756c74696d656469612e6a666966, '2023-03-06 14:59:25', 'gs@gmail.com', 8, 'multimedia.jfif', 'multimedia.jfif', 14),
(137, 'The 5 Best Bike Trailers for Kids', 'Looking for a fun way to zip around town with little ones? We considered more than 12 bike trailers before selecting 8 fun options to compare in our roundup. A great bike trailer can be an excellent way to get out and about for family adventures outside of jogging or strolling.', 'Looking for a fun way to zip around town with little ones? We considered more than 12 bike trailers before selecting 8 fun options to compare in our roundup. A great bike trailer can be an excellent way to get out and about for family adventures outside of jogging or strolling.', 'Looking for a fun way to zip around town with little ones? We considered more than 12 bike trailers before selecting 8 fun options to compare in our roundup. A great bike trailer can be an excellent way to get out and about for family adventures outside of jogging or strolling.', 0x3532353734345f32353338325f584c2e706e67, '2023-03-06 15:15:46', 'gs@gmail.com', 9, '525744_25382_XL.png', '525744_25382_XL.png', 2),
(139, 'Adani\'s Mudra Power Plant under scanner with $1 b', 'Adani\'s Mundra power plant has more liabilities than assets and has run up $1.8 billion of losses, as per a Bloomberg report which added that the conglomerate has deployed more than $1 billion of creative debt-financing to paper over the deficit and reassured investors and lenders that profits will come soon.', 'But Adani Power Ltd.’s auditor can’t fully make sense of the math underpinning this claim — and neither can accounting experts who spoke with Bloomberg News. “The Mundra Thermal Power Plant — and its debt, which experts say appears designed to shield Adani Power from extraordinary writeoffs, regardless of the unit’s losses — exemplifies this balancing act, where a single asset writedown could have cascading ramifications,\" stated the Bloomberg report.', 'Adani Group stocks took a beating on the exchanges after US-based short seller Hindenburg Research last month made a litany of allegations, including fraudulent transactions and share price manipulation, against it. The group has dismissed the charges as lies, saying it complies with all laws and disclosure requirements. \r\n\r\n', 0x696d616765732e6a666966, '2023-03-06 15:40:44', 'gs@gmail.com', 10, 'images.jfif', 'images.jfif', 6),
(189, 'The Indian Premier League (IPL)', 'The Indian Premier League (IPL) (also known as the TATA IPL for sponsorship reasons) is a men\'s Twenty20 (T20) cricket league held annually in India and contested by ten city-based franchise teams.[3][4] The league was founded by the Board of Control for Cricket in India (BCCI) in 2007. Arun Singh Dhumal is chairman of the IPL.[5] The competition is usually held annually in summer (between March and May) and has an exclusive window in the ICC Future Tours Programme, meaning that less international cricket take place during the IPL seasons.[6]', 'The IPL is the most popular cricket league in the world, and in 2014 it was ranked sixth by average attendance among all sports leagues.[7][needs update] In 2010, the IPL became the first sporting event in the world to be broadcast live on YouTube.[8][9] The brand value of the IPL in 2022 was ₹90,038 crore (US$11 billion).[10] According to BCCI, the 2015 IPL season contributed ₹1,150 crore (US$140 million) to the GDP of the India.[11] In December 2022, the league became a decacorn valued at $10.9 billion registering a 75% growth in dollar terms since 2020 when it was valued at $6.2 billion, according to a report by consulting firm D & P Advisory.[12]', 'There have been fifteen seasons of the tournament. The current title holders are the Gujarat Titans, winning the 2022 edition by defeating Rajasthan Royals in the final game.', 0x69706c3337383136352e706e67, '2023-04-11 16:43:20', 'gs@gmail.com', 12, 'ipl233211.png', 'ipl33603.jpg', 7),
(212, 'The IPL is the most popular cricket league in the world, and in 2014 it was ranked sixth by average attendance among all sports leagues.', 'The IPL is the most popular cricket league in the world, and in 2014 it was ranked sixth by average attendance among all sports leagues.', 'The IPL is the most popular cricket league in the world, and in 2014 it was ranked sixth by average attendance among all sports leagues.', 'The IPL is the most popular cricket league in the world, and in 2014 it was ranked sixth by average attendance among all sports leagues.', 0x69706c3239333438362e706e67, '2023-04-20 18:26:13', 'ganesh@gmail.com', 12, 'ipl71826.jpg', 'ipl348388.png', 0),
(213, 'The IPL is the most popular cricket league in the world, and in 2014 it was ranked sixth by average attendance among all sports leagues.', 'The IPL is the most popular cricket league in the world, and in 2014 it was ranked sixth by average attendance among all sports leagues.', 'The IPL is the most popular cricket league in the world, and in 2014 it was ranked sixth by average attendance among all sports leagues.', 'The IPL is the most popular cricket league in the world, and in 2014 it was ranked sixth by average attendance among all sports leagues.', 0x69706c3239333230372e706e67, '2023-04-20 18:26:16', 'ganesh@gmail.com', 12, 'ipl18262.jpg', 'ipl387541.png', 0),
(214, 'The IPL is the most popular cricket league in the world, and in 2014 it was ranked sixth by average attendance among all sports leagues.', 'The IPL is the most popular cricket league in the world, and in 2014 it was ranked sixth by average attendance among all sports leagues.', 'The IPL is the most popular cricket league in the world, and in 2014 it was ranked sixth by average attendance among all sports leagues.', 'The IPL is the most popular cricket league in the world, and in 2014 it was ranked sixth by average attendance among all sports leagues.', 0x69706c3234333932352e706e67, '2023-04-20 18:26:17', 'ganesh@gmail.com', 12, 'ipl89940.jpg', 'ipl324684.png', 0),
(215, 'The IPL is the most popular cricket league in the world, and in 2014 it was ranked sixth by average attendance among all sports leagues.', 'The IPL is the most popular cricket league in the world, and in 2014 it was ranked sixth by average attendance among all sports leagues.', 'The IPL is the most popular cricket league in the world, and in 2014 it was ranked sixth by average attendance among all sports leagues.', 'The IPL is the most popular cricket league in the world, and in 2014 it was ranked sixth by average attendance among all sports leagues.', 0x69706c3238343531382e706e67, '2023-04-20 18:26:17', 'ganesh@gmail.com', 12, 'ipl18383.jpg', 'ipl365542.png', 0),
(216, 'The IPL is the most popular cricket league in the world, and in 2014 it was ranked sixth by average attendance among all sports leagues.', 'The IPL is the most popular cricket league in the world, and in 2014 it was ranked sixth by average attendance among all sports leagues.', 'The IPL is the most popular cricket league in the world, and in 2014 it was ranked sixth by average attendance among all sports leagues.', 'The IPL is the most popular cricket league in the world, and in 2014 it was ranked sixth by average attendance among all sports leagues.', 0x69706c3232323035302e706e67, '2023-04-20 18:26:18', 'ganesh@gmail.com', 12, 'ipl80546.jpg', 'ipl363460.png', 0),
(217, 'The IPL is the most popular cricket league in the world, and in 2014 it was ranked sixth by average attendance among all sports leagues.', 'The IPL is the most popular cricket league in the world, and in 2014 it was ranked sixth by average attendance among all sports leagues.', 'The IPL is the most popular cricket league in the world, and in 2014 it was ranked sixth by average attendance among all sports leagues.', 'The IPL is the most popular cricket league in the world, and in 2014 it was ranked sixth by average attendance among all sports leagues.', 0x69706c3239353436312e706e67, '2023-04-20 18:26:19', 'ganesh@gmail.com', 12, 'ipl33621.jpg', 'ipl395794.png', 0),
(218, 'The IPL is the most popular cricket league in the world, and in 2014 it was ranked sixth by average attendance among all sports leagues.', 'The IPL is the most popular cricket league in the world, and in 2014 it was ranked sixth by average attendance among all sports leagues.', 'The IPL is the most popular cricket league in the world, and in 2014 it was ranked sixth by average attendance among all sports leagues.', 'The IPL is the most popular cricket league in the world, and in 2014 it was ranked sixth by average attendance among all sports leagues.', 0x69706c3232323333362e706e67, '2023-04-20 18:26:19', 'ganesh@gmail.com', 12, 'ipl89482.jpg', 'ipl327345.png', 0),
(219, 'The IPL is the most popular cricket league in the world, and in 2014 it was ranked sixth by average attendance among all sports leagues.', 'The IPL is the most popular cricket league in the world, and in 2014 it was ranked sixth by average attendance among all sports leagues.', 'The IPL is the most popular cricket league in the world, and in 2014 it was ranked sixth by average attendance among all sports leagues.', 'The IPL is the most popular cricket league in the world, and in 2014 it was ranked sixth by average attendance among all sports leagues.', 0x69706c3231303334352e706e67, '2023-04-20 18:26:19', 'ganesh@gmail.com', 12, 'ipl89790.jpg', 'ipl384951.png', 0),
(220, 'The IPL is the most popular cricket league in the world, and in 2014 it was ranked sixth by average attendance among all sports leagues.', 'The IPL is the most popular cricket league in the world, and in 2014 it was ranked sixth by average attendance among all sports leagues.', 'The IPL is the most popular cricket league in the world, and in 2014 it was ranked sixth by average attendance among all sports leagues.', 'The IPL is the most popular cricket league in the world, and in 2014 it was ranked sixth by average attendance among all sports leagues.', 0x69706c3238323234382e706e67, '2023-04-20 18:26:20', 'ganesh@gmail.com', 12, 'ipl98230.jpg', 'ipl335522.png', 1);

-- --------------------------------------------------------

--
-- Table structure for table `blog_posts_saved`
--

CREATE TABLE `blog_posts_saved` (
  `srno` int(100) NOT NULL,
  `post_id` int(100) NOT NULL,
  `user_id` varchar(50) NOT NULL,
  `token` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `blog_posts_saved`
--

INSERT INTO `blog_posts_saved` (`srno`, `post_id`, `user_id`, `token`) VALUES
(405, 13, 'sam@gmail.com', '13_sam@gmail.com'),
(418, 135, 'sam@gmail.com', '135_sam@gmail.com'),
(422, 137, 'ganesh@gmail.com', '137_ganesh@gmail.com'),
(445, 1, 'sam@gmail.com', '1_sam@gmail.com'),
(455, 137, 'sam@gmail.com', '137_sam@gmail.com'),
(459, 189, 'sam@gmail.com', '189_sam@gmail.com'),
(463, 139, 'sam@gmail.com', '139_sam@gmail.com'),
(465, 6, 'sam@gmail.com', '6_sam@gmail.com'),
(474, 4, 'sam@gmail.com', '4_sam@gmail.com'),
(484, 217, 'sam@gmail.com', '217_sam@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `blog_posts_user_likes`
--

CREATE TABLE `blog_posts_user_likes` (
  `srno` int(100) NOT NULL,
  `postid` int(100) NOT NULL,
  `userid` varchar(100) NOT NULL,
  `token` varchar(100) NOT NULL,
  `likes` varchar(100) NOT NULL DEFAULT 'false'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `blog_posts_user_likes`
--

INSERT INTO `blog_posts_user_likes` (`srno`, `postid`, `userid`, `token`, `likes`) VALUES
(188, 1, 'ganesh@gmail.com', '1_ganesh@gmail.com', 'liked'),
(189, 192, 'ganesh@gmail.com', '192_ganesh@gmail.com', 'liked'),
(190, 6, 'ganesh@gmail.com', '6_ganesh@gmail.com', 'liked'),
(191, 137, 'ganesh@gmail.com', '137_ganesh@gmail.com', 'liked'),
(192, 189, 'ganesh@gmail.com', '189_ganesh@gmail.com', 'liked'),
(193, 139, 'ganesh@gmail.com', '139_ganesh@gmail.com', 'liked'),
(194, 3, 'ganesh@gmail.com', '3_ganesh@gmail.com', 'liked'),
(196, 135, 'sam@gmail.com', '135_sam@gmail.com', 'liked'),
(197, 192, 'sam@gmail.com', '192_sam@gmail.com', 'liked'),
(198, 189, 'sam@gmail.com', '189_sam@gmail.com', 'liked'),
(199, 13, 'sam@gmail.com', '13_sam@gmail.com', 'liked'),
(200, 139, 'sam@gmail.com', '139_sam@gmail.com', 'liked'),
(201, 137, 'sam@gmail.com', '137_sam@gmail.com', 'liked'),
(202, 1, 'sam@gmail.com', '1_sam@gmail.com', 'liked'),
(203, 4, 'sam@gmail.com', '4_sam@gmail.com', 'liked'),
(204, 6, 'sam@gmail.com', '6_sam@gmail.com', 'liked'),
(205, 220, 'sam@gmail.com', '220_sam@gmail.com', 'liked');

-- --------------------------------------------------------

--
-- Table structure for table `blog_post_category`
--

CREATE TABLE `blog_post_category` (
  `post_cat_id` int(20) NOT NULL,
  `post_cat_name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `blog_post_category`
--

INSERT INTO `blog_post_category` (`post_cat_id`, `post_cat_name`) VALUES
(1, 'Lifestyle'),
(2, 'Shopping'),
(3, 'Health'),
(4, 'Travel'),
(5, 'Food'),
(6, 'Kids'),
(7, 'News'),
(8, 'Multimeda'),
(9, 'Affiliate'),
(10, 'Business'),
(11, 'Deals2buy'),
(12, 'demo');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `blog_admins`
--
ALTER TABLE `blog_admins`
  ADD UNIQUE KEY `admin_id` (`admin_id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `blog_posts`
--
ALTER TABLE `blog_posts`
  ADD PRIMARY KEY (`post_id`);
ALTER TABLE `blog_posts` ADD FULLTEXT KEY `post_content` (`post_content`);

--
-- Indexes for table `blog_posts_saved`
--
ALTER TABLE `blog_posts_saved`
  ADD PRIMARY KEY (`srno`),
  ADD UNIQUE KEY `token` (`token`);

--
-- Indexes for table `blog_posts_user_likes`
--
ALTER TABLE `blog_posts_user_likes`
  ADD PRIMARY KEY (`srno`),
  ADD UNIQUE KEY `token` (`token`);

--
-- Indexes for table `blog_post_category`
--
ALTER TABLE `blog_post_category`
  ADD PRIMARY KEY (`post_cat_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `blog_admins`
--
ALTER TABLE `blog_admins`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `blog_posts`
--
ALTER TABLE `blog_posts`
  MODIFY `post_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=221;

--
-- AUTO_INCREMENT for table `blog_posts_saved`
--
ALTER TABLE `blog_posts_saved`
  MODIFY `srno` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=486;

--
-- AUTO_INCREMENT for table `blog_posts_user_likes`
--
ALTER TABLE `blog_posts_user_likes`
  MODIFY `srno` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=206;

--
-- AUTO_INCREMENT for table `blog_post_category`
--
ALTER TABLE `blog_post_category`
  MODIFY `post_cat_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

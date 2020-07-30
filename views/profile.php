<!Doctype html>
<html>
    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" type="text/css" href="temp.css">
        <script src="./scripts/jquery-3.5.1.min.js"></script> 
        <script src='https://kit.fontawesome.com/a076d05399.js'></script>
        <title>Profile</title>
    </head>
    <body>
        <div class="main_div">
            <div class="navigation">
                <ul id="nav">
                    <li id="twit">
                        <a href="">
                            <i class="fab fa-twitter"></i>
                         
                        </a>
                    </li>
                    <li id="home">
                        <a href="">
                            <!-- <i class="fas fa-home"></i> -->
                            <h3>Home</h3>
                        </a>
                    </li>
                    <li id="explore">
                        <a href="">
                            <!-- <i class="fas fa-hashtag"></i> -->
                            <h3>Explore</h3>
                        </a>
                    </li>
                    <li id="notifications">   
                        <a href="">
                            <!-- <i class="far fa-bell"></i> -->
                            <h3>Notifications</h3>
                        </a>
                    </li>
                    <li id="messages">
                        <a href="">
                            <!-- <i class="far fa-envelope"></i> -->
                            <h3>Messages</h3>
                        </a>
                    </li>
                    <li id="bookmarks">
                        <a href="">
                            <h3>Bookmarks</h3>
                        </a>
                    </li>
                    <li id="lists">
                        <a href="">
                            <h3>Lists</h3>
                        </a>
                    </li>
                    <li id="profile">
                        <a href="">
                            <h3>Profile</h3>
                        </a>
                    </li>
                    <li id="more">
                        <a href="">
                            <h3>More</h3>
                        </a>
                    </li>                    
                </ul>
                <button id="tweet">Tweet</button>
            </div>
            <div class="content">
                <div class="head">
                    <h3>Name Surname</h3>
                    <p>tweets count</p>
                </div>
                <div class="prof_info">
                    <div class="cover">

                    </div>
                    <img src="user.jpg">
                    <div class="info">
                        <h3>Name Surname</h3>
                        <p>@username</p>
                        <p id="joined">joined on [month] [year]</p>
                        <div class="main_div">
                            <p>[count] followings</p>
                            <p>[count] followers</p>
                        </div>
                        
                    </div>
                    <div id="user_nav">
                        <ul class="user_nav">
                            <li>
                                <a href="">
                                    <p>
                                        Tweets
                                    </p>
                                </a>
                            </li>
                            <li>
                                <a href="">
                                    <p>
                                        Tweets & replies
                                    </p>
                                </a>
                            </li>
                            <li>
                                <a href="">
                                    <p>
                                        Media
                                    </p>
                                </a>
                            </li>
                            <li>
                                <a href="">
                                    <p>
                                        Likes
                                    </p>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="container">
                    <div class="article">
                        <div class="tweet">
                            <div class="twt_head">
                                <img src="user.jpg" class="usr">
                                <h4>Name Surname</h4>
                                <p>@username</p>
                                <p>[time]</p>
                            </div>
                            <div class="tweet_content">
                                <p class="tweet_txt">
                                    Lorem Ipsum is simply dummy text of the printing and typesetting industry. 
                                    Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, 
                                    when an unknown printer took a galley of type and scrambled it to make a type specimen book.
                                </p>
                                <div class="media">
                                    <img src="landscape.jpg" class="tweet_media">
                                </div>
                            </div>
                    </div>
                        <ul class="actions">
                            <li>
                                <p class="comment">[Count]</p>
                            </li>
                            <li>
                                <p class="retweet">
                                    [Count]
                                </p>
                            </li>
                            <li>
                                <p class="like">[Count]</p>
                            </li>
                            <li class="share">
                                <i class="far fa-share-square"></i>

                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="sidebar">
                <div class="searchBox">
                    <input type="text" placeholder="Search Twitter" id="search">
                </div>
                <div class="suggestions">
                    <div class="sug_head">
                        <h3>Who To Follow</h3>
                    </div>
                    <div class="user_sug">
                        <img src="user.jpg">
                        <div class="info">
                            <h3>Name Surname</h3>
                            <p>@username</p>
                            <button>Follow</button>
                        </div>
                    </div>
                    <div class="user_sug">
                        <img src="user.jpg">
                        <div class="info">
                            <h3>Name Surname</h3>
                            <p>@username</p>
                            <button>Follow</button>
                        </div>
                    </div>
                    <div class="user_sug">
                        <img src="user.jpg">
                        <div class="info">
                            <h3>Name Surname</h3>
                            <p>@username</p>
                            <button>Follow</button>
                        </div>
                        
                    </div>
                </div>
                <footer>
                    <div class="container">
                        <a href="">
                            <p>Terms</p>
                        </a>
                        <a href="">
                            <p>Privacy policy</p>
                        </a>
                        <a href="">
                            <p>Cookies</p>
                        </a>
                        <a href="">
                            <p>Ads info</p>
                        </a>
                        <a href="">
                            <p>More</p>
                        </a>
                    </div>
                    <p id="copyright"> &#169; 2020 all right reserved </p>
                </footer>
            </div>
        </div>
    </body>
</html>
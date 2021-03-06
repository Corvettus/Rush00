<?php

	session_start();

	if (!@$_SESSION["logged_user"])
		$_SESSION["logged_user"] = "";

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="css/style.css">
  <title>e-com shop</title>
</head>
<body>
  <header class="header">
    <div class="container">
      <div class="header-main">
        <div class="header-main__logo">LOGO</div>
        <div class="header-main__user user">
          <div class="user-account">
			<div class="user-account__openbtn" id="accountBtn"><svg viewBox="0 0 496 512"><path d="M248 8C111 8 0 119 0 256s111 248 248 248 248-111 248-248S385 8 248 8zm0 96c48.6 0 88 39.4 88 88s-39.4 88-88 88-88-39.4-88-88 39.4-88 88-88zm0 344c-58.7 0-111.3-26.6-146.5-68.2 18.8-35.4 55.6-59.8 98.5-59.8 2.4 0 4.8.4 7.1 1.1 13 4.2 26.6 6.9 40.9 6.9 14.3 0 28-2.7 40.9-6.9 2.3-.7 4.7-1.1 7.1-1.1 42.9 0 79.7 24.4 98.5 59.8C359.3 421.4 306.7 448 248 448z"></path></svg></div>
			<?php

				if (!$_SESSION["logged_user"]) {
					include("./login.php");
				} else {
					include("./manage.php");
				}

			?>
		  </div>
          <div class="user-basket">
            <a href="#" class="user-basket__link"><svg viewBox="0 0 576 512"><path d="M528.12 301.319l47.273-208C578.806 78.301 567.391 64 551.99 64H159.208l-9.166-44.81C147.758 8.021 137.93 0 126.529 0H24C10.745 0 0 10.745 0 24v16c0 13.255 10.745 24 24 24h69.883l70.248 343.435C147.325 417.1 136 435.222 136 456c0 30.928 25.072 56 56 56s56-25.072 56-56c0-15.674-6.447-29.835-16.824-40h209.647C430.447 426.165 424 440.326 424 456c0 30.928 25.072 56 56 56s56-25.072 56-56c0-22.172-12.888-41.332-31.579-50.405l5.517-24.276c3.413-15.018-8.002-29.319-23.403-29.319H218.117l-6.545-32h293.145c11.206 0 20.92-7.754 23.403-18.681z"></path></svg></a>
          </div>
        </div>
	  </div>
	</div>
  </header>

  <main class="shop">
    <div class="container">
      <nav class="shop-nav">
        <div class="shop-nav__item">Cat 1</div>
        <div class="shop-nav__item">Cat 2</div>
        <div class="shop-nav__item">Cat 3</div>
        <div class="shop-nav__item">Cat 4</div>
      </nav>
      <div class="shop-main">
        <h3 class="shop-main__header">
			Categorie
        </h3>
        <div class="shop-main__showcase showcase">

		<?php

			include("products.php");

			$content = products();

			foreach ($content as $item) {
				echo "<div class=\"showcase__item\">" . "<div class=\"card\">" . "<div class=\"card-pic\">" . "<img src=\"" . $item["img"] . "\">" . "</div>" .
						"<div class=\"card-info\">" . "<span class=\"card-info__title\">" . $item["name"] . "</span>" .
						"<span class=\"card-info__price\">" . $item["price"] . "</span>" . "</div>" .
						"<button type=\"submit\" class=\"card__btn\" product-id=" . $item["id"] . " id=\"buyBtn\">Buy</button>" . "</div>" . "</div>";
			}

		?>

          <!-- <div class="showcase__item">
            <div class="card">
              <div class="card-pic">
                <img src="./img/42.png" alt="">
              </div>
              <div class="card-info">
                <span class="card-info__title">42 image</span>
                <span class="card-info__price">42 $</span>
              </div>
              <button type="submit" class="card__btn">Buy</button>
            </div>
          </div> -->
        </div>
      </div>
    </div>
  </main>

  <footer class="footer">
    <div class="container">
      <div class="footer-wrapper">
        <div class="footer-left"></div>
      </div>
    </div>
  </footer>

  <div class="modal" id="modal">
  <?php

		if (!$_SESSION["logged_user"]) {
			include("create.html");
	  	} else {
			include("change.html");
		}

  ?>
  </div>

  <script src="./main.js"></script>
</body>
</html>

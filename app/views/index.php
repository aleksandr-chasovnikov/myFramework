<!DOCTYPE html>
<html lang="ru">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>DEFAULT</title>
<!--   <link rel="stylesheet" href="css/font-awesome/font-awesome.min.css">
  <link rel="stylesheet" href="css/bootstrap3/bootstrap.min.css"> -->
  <link href="/css/screen.css" rel="stylesheet">
</head>
<body>
    <div class="wrapper">
      <header class="header"><!-- HEADER ============= -->

            <div class="header__logo logo">
              <a href="/">
                <img src="" alt="logo" class="logo__img">
              </a>
            </div>
            <nav class="header__nav nav">
              <a href="#" class="nav__link nav__link_active">Lorem</a>
              <a href="#" class="nav__link">Lorem</a>
              <a href="#" class="nav__link">Lorem</a>
              <a href="#" class="nav__link nav__link_last">Lorem</a>
            </nav>

      </header><!-- HEADER END ============ --> 
      <main class="content"><!-- MAIN ============= -->
        <section class="my-contain">

          <article class="article__item item">
            <img src="" alt="image" class="item__img">
            <p class="item__description">

              <?=__FILE__?>

            </p>
            <a href="#" class="item__link item__link_more">Lorem</a>
            <a href="#" class="item__link">Lorem</a>
          </article>

          <article class="article__item item">
            <img src="" alt="image" class="item__img">
            <p class="item__description">

              <?=__FILE__?>

            </p>
            <a href="#" class="item__link item__link_more">Lorem</a>
            <a href="#" class="item__link">Lorem</a>
          </article>

      </section><!-- container -->                                
    </main><!-- MAIN END =============== -->

    <footer class="footer"><!-- FOOTER =============== -->
      <div class="footer__logo logo">
        <img src="" alt="logo" class="logo__img logo__img_small">
      </div>

      <div class="copy">
          <p class="copy text-center">&copy; Компания </p>
      </div>      
    </footer><!-- FOOTER END =============== -->

</div><!-- wrapper END -->

  <a href="#" class="btn up-button" role="button" title="Кнопка вверх"></a>

    <!--[if lt IE 9]>
    <script src="libs/html5shiv/es5-shim.min.js"></script>
    <script src="libs/html5shiv/html5shiv.min.js"></script>
    <script src="libs/html5shiv/html5shiv-printshiv.min.js"></script>
    <script src="libs/respond/respond.min.js"></script>
    <![endif]-->
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="/template/js/my.js"></script>
<script>
    $(document).ready(function(){
        $(".add-to-cart").click(function () {
            var id = $(this).attr("data-id");
            $.post("/cart/addAjax/"+id, {}, function (data) {
                $("#cart-count").html(data);
            });
            return false;
        });
    });
</script>
  </body>
  </html>
<!DOCTYPE html>
<html>
<head>
  <title>Test Facebook Obac alert</title>

  <meta property="og:url"           content="http://alert.test/pdf" />
  <meta property="og:type"          content="website" />
  <meta property="og:title"         content="OBAC ALERT CONTENU DE TEST" />
  <meta property="og:description"   content="Your description" />
  <meta property="og:image"         content="{{asset('img/fbpartage.png')}}" />
</head>
<body>

  <!-- Load Facebook SDK for JavaScript -->
  <div id="fb-root"></div>
  <script>(function(d, s, id) {
    var js, fjs = d.getElementsByTagName(s)[0];
    if (d.getElementById(id)) return;
    js = d.createElement(s); js.id = id;
    js.src = "https://connect.facebook.net/en_US/sdk.js#xfbml=1&version=v3.0";
    fjs.parentNode.insertBefore(js, fjs);
  }(document, 'script', 'facebook-jssdk'));</script>

  <!-- Your share button code -->
  <div class="fb-share-button"
    data-large="large"
    data-href="http://alert.test/villes/1"
    data-layout="button_count">
  </div>

</body>
</html>
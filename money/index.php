<!DOCTYPE html>
<html>
<head>
    <title>Currency Converter</title>
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <div class="container text-uppercase">
        <div class="logo text-center">
            <h1>Currency Converter</h1>
        </div>
        <form class="form-inline text-center" action="" method="GET">
            <div class="form-group">
                <lable for="currency1">Currency 1</lable>
                <input type="text" name="currency1" id="currency1" class="form-control" placeholder="USD">
                <lable for="currency2">Currency 2</lable>
                <input type="text" name="currency2" id="currency2" class="form-control" placeholder="BDT">
                <input type="submit" name="submit" value="Convert" class="btn btn-default">
            </div>
        </form>
        <div class="result">
            
        </div>
            <?php 
            require_once 'vendor/autoload.php';
            $httpAdapter = new \Ivory\HttpAdapter\FileGetContentsHttpAdapter();
            $yahooProvider = new \Swap\Provider\YahooFinanceProvider($httpAdapter);
            // Create Swap with the provider
            $swap = new \Swap\Swap($yahooProvider);
            if (isset($_GET['submit'])) {
                
                $currency1 = $_GET['currency1'];
                $currency2 = $_GET['currency2'];
                
                if (empty($currency1) || empty($currency2)) { ?>
                    <div class="error alert alert-danger text-center">
                        <strong>Warning!</strong> Please feill the form.
                    </div>
               <?php }else {
                    $rate = $swap->quote($currency1.'/'.$currency2); ?>

                    <div class="result text-center">
                        <h1><?php echo $currency1,'/',$currency2,' = ', $rate; ?></h1>
                    </div>           
                <?php }
            }
            ?>
    </div>
</body>
</html>
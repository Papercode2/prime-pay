<html>
    <head>
        <link rel="stylesheet" href="style.css">
<style>
    .inputfields{
        width: 90%;
        height: 30px;
        border-radius: 5px;
        outline: none;
        border: none;
        margin: auto; 
      
    }
    .offer{
        height: 100vh;
        background: powderblue;
    }
    input{
        margin-top: 10x;
        background: #eee;
        outline:2.5px solid green;
    }
    .form-conatainer{
        width: 200px;
        height: 250px;
        box-shadow: 0 0 20px 0px;
        background:   #fff;
        margin: auto;
    }
   
    .btns{
        background: tomato;
        border: none;
        width: 80px;
        height: 30px;
        border-radius: 20px;
        margin-left: 50px;
        margin-top: 5px;
       
        font-size: 17px;
        transition:background 1.5s;
    }
    .btns:hover{
        background: green;
    }
    h2{
        text-align: center;
        color: green;
        font-size: 30px;
    }
    h2::after{
        content: '';
        width: 90px;
        margin-top: 35px;
        transform: translateX(-130%);
        height: 4px;
        background: tomato;
        border-radius: 3px;
        position: absolute;
    }
    .row{
        display: flex;
        justify-content: space-between;
    }
    .col-2{
        flex-basis: 50%;
    }
.col-2 img{
    width: 100%;
}
h3{
    margin-top: 20px;
    cursor: pointer;
    margin-left: 60px;
    font-size: 30px;
    background: green;
    width: 170px;
    height: 40px;
    border-radius: 30px;
    padding: 10px 5px;
}
.back{
    left: 20px;
    top: 15px;
    background: white;
    position: fixed;
    border-radius: 3px;
    cursor: pointer;

}
</style>
    </head>
    <body>
        <div class="offer">
            <div class="small-container">
                <div class="row">
                    <div class="col-2">
                    <img src="IMG_20230128_230612.jpg"width="460" height="500">
                    </div>
                    <div class="col-2">
                        
                    <div class="row">
                        <div class="col-2">
                            <div class="h3"id="menubtn"><h3 >DEPOSIT&#8594;</h3> </div>
                          
                        
                        
                    </div>
                    <div class="col-2">
                        <form  method="POST">
                            <div class="form-conatainer"id=sidenav>
                                <div class="pay">
                                   <marquee behavior="" direction=""><h2>Deposit Now</h2></marquee> 
                                </div>
                                <div class="mesg">
                                <small style="background-color: aqua; color: green;margin:40px;font-size: 20px;">
                                    
                                   
                                </small>
                                </div>
                               
                                <div class="inputfields">
                                  

                                        <div class="form">
                                        <input type="number"placeholder="Phone number" minlength="10" autocomplete="off" name="phonenuber"required value="">
                                        <input type="number"placeholder="Amount" autocomplete="off" name="amount" value=""required>
                                    </div>
                                    <span id="message"></span>
                                        <button type="submit"class="btns" name="pay">Deposit</button>
                                    </div>
                                </div>
                                    </form>
                                    </div>
                                </div>
                                    </div>
                                </div>
                            </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>       
        </div>
        
        <?php
if(isset($_POST['pay'])){

    $amount = $_POST['amount']; //Amount to transact
$phonenuber = $_POST['phonenuber']; // Phone number paying start with 07
$Account_no = 'UMESKIA SOFTWARES'; // Enter account number optional
$url = 'https://tinypesa.com/api/v1/express/initialize';
$data = array(
    'amount' => $amount,
    'msisdn' => $phonenuber,
    'account_no' => $Account_no
);
$headers = array(
    'Content-Type: application/x-www-form-urlencoded',
    'ApiKey: nmwYS9WVtjD' // Replace with your api key
);
$info = http_build_query($data);
$curl = curl_init();
curl_setopt($curl, CURLOPT_URL, $url);
curl_setopt($curl, CURLOPT_POST, true);
curl_setopt($curl, CURLOPT_POSTFIELDS, $info);
curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);
$resp = curl_exec($curl);
if ($resp === false) {
    echo "CURL ERROR: " . curl_error($curl);
}
$msg_resp = json_decode($resp);

if ($msg_resp->success == 'true') {
    echo "<script>alert('WAIT FOR TINYPESA STK POP UP')</script>";
   
}
}
?>

<a href="home.php"><button type="submit" class="back">Back to dashboard </button></a>  
       

</body>
</html>
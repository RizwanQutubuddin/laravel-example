<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Test</title>
</head>

<body>
    <h1>Test Blade PHP</h1>
    @php
    $name='jennifer';
    $fruits=array('Mango','Apple','Banana','Pineapple');
    @endphp
    <p>{{$name}}</p>
    <ul>
        @foreach($fruits as $fruit)
        <li>{{$fruit}}</li>
        @endforeach
    </ul>
    <input type="text" id="digit" />
    <input type="button" id="btnResult" onclick="conversion()" value="Result" />
    <div id="convertResult"></div>
    <script>
        let once = ['', 'one', 'two', 'three', 'four', 'five', 'six', 'seven', 'eight', 'nine', 'ten', 'eleven', 'twelve', 'thirteen', 'fourteen', 'fifteen', 'sixteen', 'seventeen', 'eighteen', 'nine', 'twenty'];
        let nty = ['', '', 'twenty', 'thirty', 'forty', 'fifty', 'sixty', 'seventy', 'eighty', 'ninty'];
        
        function conversion() {
            let result='';
            let digit = document.getElementById('digit').value;
            let q;
            if (!isNaN(digit) && digit.toString().length > 0) {
                while (digit > 0) {
                    no = digit.toString().length;
                    if(no>9){
                        result='number is more than 9 digit.';
                        break;
                    }
                    switch (no) {
                        
                        case 9:
                        case 8:
                            q= Math.floor(parseInt(digit)/10000000);
                            digit=parseInt(digit)-q*10000000;
                            result+=convert(q)+" crore ";
                        break;
                        case 7:
                        case 6:
                            q= Math.floor(parseInt(digit)/100000);
                            digit=parseInt(digit)-q*100000;
                            result+=convert(q)+" lakh ";
                        break;
                        case 5:
                        case 4:    
                            q= Math.floor(parseInt(digit)/1000);
                            digit=parseInt(digit)-q*1000;
                            result+=convert(q)+" thousand ";
                        break;
                        case 3:
                            q= Math.floor(parseInt(digit)/100);
                            digit=parseInt(digit)-q*100;
                            result+=convert(q)+" hundred ";
                        break;
                        case 2:
                            q= parseInt(digit);;
                            result+=convert(q);
                            digit=0;
                        break;
                        case 1:
                            q= digit;
                            result+=convert(q);
                            digit=0;
                        break;
                        default:
                            result='number is more than 10crore';
                        break;
                    }
                }
                document.getElementById('convertResult').innerText=result;
            } else {
                document.getElementById('convertResult').innerText='insert valid number';
            }
        }

        function convert(num){
            if(20>=num){
                return once[num];
            }else{
                r=num%10;
                num=Math.floor(num/10);
                return nty[num]+' '+once[r];
            }

        }
    </script>
</body>

</html>
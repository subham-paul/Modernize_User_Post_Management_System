<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">

</head>
<body>
    <header class="modal-header">
     <h1>Hello world this our first Page in Laravel </h1>
     
    </header>
    <div class="container-fluid">
    <header class="modal-header">         
    <h4>@php echo "Hello" @endphp</h4>
</header>
    <p class="card p-3 m-3" style="text-align:justify;">
 Lorem ipsum dolor sit amet consectetur adipisicing elit. Commodi voluptatum molestias obcaecati iusto. Eius optio tempora officiis dolorem tempore. Quidem, consequuntur. Hic non voluptatum excepturi voluptas atque saepe, magni aut.
        Voluptatibus soluta provident dolores eligendi magni laborum molestiae ipsum harum, quibusdam nesciunt aperiam sed laudantium vitae recusandae quaerat error animi unde reprehenderit corporis repellat cumque vero dolorem dolore! Alias, quam?
        Aliquid eveniet, iste, saepe amet debitis ut laborum iusto, nesciunt culpa fugiat expedita! Numquam commodi incidunt ut dolor non nisi optio similique, quia cumque nihil repellat ipsam, vero autem maiores.
        Deserunt dolores ratione harum, inventore aliquid voluptate libero quasi eos maxime eaque nobis autem enim molestias vel nisi, doloribus excepturi, tempora corporis quidem labore aut quos repellat reprehenderit. Officia, iste.
     </p>
     <p>Sum of 2 Numbers:</p>
     @php 
         $x=100;
         $y=100;
         $z=$x+$y;
         echo "Sum is ".$z;
         
         @endphp
    @if($x>$y)
      <p>Greater No is {{$x}}</p>
    @elseif($y>$x)
      <p>Greater No is {{$y}}</p>
    @else 
      <p>{{$x}}=={{$y}}</p>
    @endif
    <h4>Basic Loop Example </h4>
    @php 
       $i=1;
    @endphp
    @while($i<=5)
      @php echo $i;
        $i+=1
       @endphp
      
    @endwhile
    <h2>For Loop :</h2>
    @for($i=1;$i<=5;$i++)
    <p>Value ={{$i}}</p>
    @endfor

    @php 
      $users = [
          0=>['id'=>1,"name"=>"Sneha"],
          1=>['id'=>2,"name"=>"Sourav"],
          3=>["id"=>3,"name"=>"Suvam"]
        ]

    @endphp
    <h4>forEach Example in Blade</h4>
    <ul>
    @foreach($users as $user)
    <li>Name :{{$user['name']}}</li>
    @endforeach
      </ul>
     @php
      date_default_timezone_set("Asia/kolkata");
     @endphp
    <h4>How to invoke Built in functions :</h4>
    <p>Current Date : {{date("d-m-y")}}</p>
    <p>Current time : {{date("h:i:sA")}}</p>
    <p>IP Address of Visitors {{request()->ip()}}</p>
    <p>Current Path : {{request()->path()}}</p>
    <p>Current URL  : {{url()->current()}}</p>
</div>

<h2>How to recieved Parameters from web.php </h2>
@if(!empty($message))
<h3>{{$message}}</h3>
@endif

</body>
</html>
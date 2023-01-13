<style>

p{
font-family:Verdana,Geneva,Tahoma ,sans-serif;
font-size:1.1em;
line-height:1.6em;

}
.button {
    display: block;
    width: 115px;
    height: 25px;
    background: #4E9CAF;
    padding: 10px;
    text-align: center;
    border-radius: 5px;
    color: white;
    font-weight: bold;
    line-height: 25px;
    text-decoration: none;
}

</style>

<div style="max-width:400px; margin:30 auto; padding:30px">
<h1>link pentru Resetarea parolei pe situl<span style="color:lightblue">website.test</span></h1>

<p>acest link este valabil 60 de minute</p>

<a href="{{ route('password.reset',['token'=>$token,'email'=>$email]) }}"  class="button">Reset Password</a>
<p>Daca butonul de mai sus nu functioneaza puteti lua cu copy si paste linkul de mai jos:</p>


{{ route('password.reset',['token'=>$token,'email'=>$email])  }}
</div>
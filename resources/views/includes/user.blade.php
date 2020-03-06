<div style="margin: 50px auto 20px auto; width: 60%">
    <img class="rounded-circle" style="margin: 10px auto; width: 100px; height: 100px" src=" {{ asset(auth()->user()->imageUrl?auth()->user()->imageUrl:'img/avatar.png')  }}" alt="">
    <h3 style="font-size: 13px">{{ auth()->user()->first_name . "  ". auth()->user()->last_name }}</h3>
    <h4 style="font-size: 12px">{{ auth()->user()->email }}</h4>
    <h5 style="font-size: 12px">{{ auth()->user()->phone }}</h5>
</div>
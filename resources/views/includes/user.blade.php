<div style="margin: 30px 5px 20px 5px">
    <img class="rounded-circle header-profile-user" src=" {{ auth()->user()->imageUrl?auth()->user()->imageUrl:'img/avatar.png'  }}" alt="">
    <h3>{{ auth()->user()->first_name . "  ". auth()->user()->last_name }}</h3>
</div>
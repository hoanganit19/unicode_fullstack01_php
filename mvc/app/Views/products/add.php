<form action="{{route('products-post')}}" method="post">
    <div>
        <label for="">Email</label>
        <input type="text" name="email" placeholder="Email..." />
    </div>
    <div>
        <label for="">Password</label>
        <input type="password" name="password" placeholder="Password..." />
    </div>
    <button type="submit">Submit</button>
</form>
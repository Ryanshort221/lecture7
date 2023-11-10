<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Home</title>
</head>
<body>
    
    @if ($errors->any())
        <div class="alert">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <h1>Welcome, {{ $name }}</h1>
    <h1>update Address</h1>
    <p>Your address: {{ $address }}</p>
    <form method="POST" action="{{ route('users.update', $user_id) }}">
        @csrf
        @method('PUT')
        <label for="address">Address</label>
        <input type="text" name="address">
        <input type="submit" value="Submit">
    </form>

    <h2>Your Phone Numbers</h2>
    @foreach($phoneNumbers as $phoneNumber)
        <p>{{ $phoneNumber->phoneNumber }}</p>
        <form method="POST" action="{{ route('phone_number_model1s.update', $phoneNumber->id) }}">
            @csrf
            @method('PUT')
            <input type="hidden" name="id" value="{{$phoneNumber->id}}">
            <input type="text" name="phoneNumber">
            <input type="submit" value="Submit">
        </form>
    @endforeach

    <h2>Your Accounts</h2>
    @foreach($accounts as $account)
        <p>Account Number: {{ $account->accountNumber }}</p>
        <p>Account Type: {{ $account->accountType }}</p>
        <p>Balance: {{ $account->balance }}</p>
    @endforeach


</body>
</html>
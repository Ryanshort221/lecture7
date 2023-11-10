<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form method="POST" action="{{ route('users.store') }}">
        @csrf
        <label for="name">Name</label>
        <input type="text" name="name">
        <label for="socialSecurityNumber">Social Security Number</label>
        <input type="text" name="socialSecurityNumber">
        <label for="address">Address</label>
        <input type="text" name="address">
        <label for="phoneNumber">Phone Number</label>
        <input type="text" name="phoneNumber">
        <label for="accountType">Account Type</label>
        <select name="accountType">
            <option value="checking">Checking</option>
            <option value="savings">Savings</option>
        </select>
        <input type="submit" value="Submit">
    </form>
</body>
</html>
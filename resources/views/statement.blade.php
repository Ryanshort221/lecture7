<!-- generate all the statements in a foreach loop and have a form to generate more statements for the user using their id -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<h1>statements</h1>
<div class="statements">
    @foreach($statements as $statement)
        <p>Statement ID: {{ $statement->id }}</p>
        <p>Account Number: {{ $statement->accountNumber }}</p>
        <p>Account Type: {{ $statement->accountType }}</p>
        <p>Balance: {{ $statement->balance }}</p>
        <p>Created At: {{ $statement->created_at }}</p>
        <p>Updated At: {{ $statement->updated_at }}</p>
    @endforeach
</div>

<form method="POST" action="{{ route('statements.store') }}">
    @csrf
    <input type="hidden" name="user_id" value="{{ $statement->user_id }}">
    <input type="submit" value="Generate Statement">
</form>

</body>
</html>
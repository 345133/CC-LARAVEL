<style>
    .checkout-button {
        background-color: #4CAF50; /* Green */
        border: none;
        color: white;
        padding: 15px 32px;
        text-align: center;
        text-decoration: none;
        display: inline-block;
        font-size: 16px;
        margin: 4px 2px;
        cursor: pointer;
        border-radius: 8px;
        transition: background-color 0.3s;
    }

    .checkout-button:hover {
        background-color: #45a049; /* Darker green on hover */
    }
</style>

<form action="{{ route('session') }}" method="POST">
    @csrf
    <button type="submit" class="checkout-button">Checkout</button>
</form>

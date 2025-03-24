@extends('layouts.master')

@section('content')
<div class="container mt-5">
    <h2 class="text-center mb-4">Simple Calculator</h2>
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card">
                <div class="card-body">
                    <div class="mb-3">
                        <label for="num1" class="form-label">Number 1</label>
                        <input type="number" id="num1" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label for="num2" class="form-label">Number 2</label>
                        <input type="number" id="num2" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label for="operation" class="form-label">Operation</label>
                        <select id="operation" class="form-select">
                            <option value="add">Addition (+)</option>
                            <option value="subtract">Subtraction (-)</option>
                            <option value="multiply">Multiplication (×)</option>
                            <option value="divide">Division (÷)</option>
                        </select>
                    </div>
                    <button class="btn btn-primary w-100" onclick="calculate()">Calculate</button>
                    <h3 class="text-center mt-3">Result: <span id="result">-</span></h3>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
function calculate() {
    let num1 = parseFloat(document.getElementById('num1').value);
    let num2 = parseFloat(document.getElementById('num2').value);
    let operation = document.getElementById('operation').value;
    let result;

    if (isNaN(num1) || isNaN(num2)) {
        result = "Please enter valid numbers!";
    } else {
        switch (operation) {
            case 'add':
                result = num1 + num2;
                break;
            case 'subtract':
                result = num1 - num2;
                break;
            case 'multiply':
                result = num1 * num2;
                break;
            case 'divide':
                result = num2 !== 0 ? (num1 / num2).toFixed(2) : "Cannot divide by zero!";
                break;
            default:
                result = "Invalid operation!";
        }
    }

    document.getElementById('result').innerText = result;
}
</script>
@endsection

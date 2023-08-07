<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <title>Document</title>
</head>
<body>
    <div>
    <form action="post">
            <table>
                <tr>
                    <td>Customer </td>
                    <td><input type="text" name="customer_name" id="customer_name"></td>
                </tr>
                <tr>
                    <td>Name Product</td>
                    <td>
                        <select name="product_name" id="product_name">
                            <option>select a product</option>
                            @foreach($product as $product_data)
                            <option value="{{$product_data->id }}">{{$product_data->product_name }}</option>
                            @endforeach
                        </select>
                    </td>
                </tr>
                <tr>
                    <td>Rate</td>
                    <td><input type="text" name="rate" id="rate" value=""></td>
                </tr>
                <tr>
                    <td>Unit</td>
                    <td><input type="text" name="unit" id="unit" value=""></td>
                </tr> 
                <tr>
                    <td>Qty</td>
                    <td><input type="text" name="qty" id="qty" value=""> </td>
                </tr>
                <tr>
                    <td>Discount (%)</td>
                    <td><input type="text" name="discount" id="discount" value=""> </td>
                </tr>
                <tr>
                    <td>Net Amount</td>
                    <td><input type="text" name="net_amount" id="net_amount" value=""></td>
                </tr>
                <tr>
                    <td>Total Amount</td>
                    <td><input type="text" name="total_amount" id="total_amount" value=""></td>
                </tr>
                <tr>
                    <td><input type="button" value="submit" id="submit" name="submit" /></td>
                </tr>
            </table>
        </form>
    </div>
    <div>
        <table border="1">
            <tr>
                <td>Product</td>
                <td>Rate</td>
                <td>Unit</td>
                <td>Qty</td>
                <td>Disc%</td>
                <td>Net Amount</td>
                <td>Total Amount</td>
                <td colspan="2">Action</td>
            </tr>
            
                @isset($sesion_data)
                    @php
                    $id = 0;
                    @endphp
                    @foreach($sesion_data as $formdata )                        
                    <tr>
                        <td>{{$formdata[0]}}</td>
                        <td>{{$formdata[1]}}</td>
                        <td>{{$formdata[2]}}</td>
                        <td>{{$formdata[3]}}</td>
                        <td>{{$formdata[4]}}</td>
                        <td>{{$formdata[5]}}</td>
                        <td>{{$formdata[6]}}</td>
                        @php 
                            $id ++;
                        @endphp
                        <td>
                            <a id="update" href="{{ url('updatedata', $id) }}" >Update</a>
                            <a id="update" href="{{ url('delete', $id) }}" >Remove</a>
                        </td>
                    </tr>
                    @endforeach
                @endif

            
        </table>
    </div>
        
</body>
</html>
<script type="text/javascript"  src="{{ asset('/js/methodcall.js')  }}"></script>
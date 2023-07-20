<!DOCTYPE html>
<html>
<head>
   
<style>
    @page { size: 20cm 35cm landscape; }

body{
    font-family: 'Golos Text', sans-serif;
    font-family: 'Itim', cursive;
}

#customers {
  border-collapse: collapse;
  width: 100%;
}

#customers td, #customers th {
  border: 1px solid #ddd;
  padding: 8px;
}

#customers tr:nth-child(even){background-color: #f2f2f2;}

#customers tr:hover {background-color: #ddd;}

#customers th {
  padding-top: 12px;
  padding-bottom: 12px;
  text-align: left;
  background-color: #3F72AF;
  color: white;
 
}
</style>
</head>
<body>

<div style="text-align: center">
    <h1>{{ $market->nama_toko }}</h1>
    @if ($market->foto_toko)
        <img src="{{ asset('storage/' . $market->foto_toko) }}" alt="" width="100" height="100" style="object-fit: cover; border-radius:50%;">
    @else
    <img src="/image/shoes.png" alt="">
    @endif

    <h3 style="font-weight: lighter;  opacity: 0.5; text-transform: capitalize">{{ $market->alamat }}</h3>
<hr>

    <h2>Revenue Untuk</h2>
    @if (session()->has('revenue_first') && session()->has('revenue_sec') )
       <h3 style="font-weight: lighter;  opacity: 0.5;">
        {{ date('d-M-Y', strtotime(session('revenue_first'))) }} s/d {{ date('d-M-Y', strtotime(session('revenue_sec'))) }}
       </h3>
    @endif

    @if (session()->has('revenue_first') && !session()->has('revenue_sec') )
       <h3 style="font-weight: lighter;  opacity: 0.5;">
        {{ date('d-M-Y', strtotime(session('revenue_first'))) }}
       </h3>
    @endif

    @if (session()->has('revenue_sec') && !session()->has('revenue_first') )
       <h3 style="font-weight: lighter;  opacity: 0.5;">
        {{ date('d-M-Y', strtotime(session('revenue_sec'))) }}
       </h3>
    @endif

    @if (!session()->has('revenue_sec') && !session()->has('revenue_first') )
    <h3 style="font-weight: lighter;  opacity: 0.5;">
     {{ $today }}
    </h3>
 @endif
</div>
<table id="customers">
    <thead>
        <tr>
          <th scope="col">No</th>
          <th scope="col">Kode Pesanan</th>
          <th scope="col">Nama Pemesan</th>
          <th scope="col">No Handphone</th>
          <th scope="col">Alamat</th>
          <th scope="col">Price</th>
          <th scope="col">Status Order</th>
         
        </tr>
      </thead>
      @if ($orders->count())
      <tbody>

        @php
            $revenue = 0;
        @endphp

         @foreach ($orders as $order)
           <tr>
            <td>{{ $loop->iteration }}</td>
            <td>{{ $order->kode_pesanan }}</td>
            <td style="text-transform: capitalize">{{ $order->nama_pemesan }}</td>
            <td>{{ $order->no_hp }}</td>
            <td style="text-transform: capitalize">{{ $order->alamat }}</td>
            <td>Rp {{ str_replace(',' , '.' , number_format($order->harga_total)) }}</td>
            <td style="text-transform: capitalize">{{ $order->status_pesanan }}</td>
         </tr>

         @php
             $revenue += $order->harga_total;
         @endphp
         @endforeach
         <tr>
            <td colspan="5" style="font-size: 21px; font-weight: bold">Revenue</td>
            <td colspan="1" style="font-size: 21px; font-weight: bold">Rp {{ str_replace(',' , '.' , number_format($revenue)) }}</td>
            <td colspan="1" style="font-size: 21px; font-weight: bold"></td>
         </tr>
         @else
         <tr>
            <td colspan="7" style="font-size: 21px; font-weight: bold">Tidak ada riwayat orders.</td>
         </tr>
      </tbody>
   
  @endif
</table>
<h3 style="font-weight :lighter;">
    <span>@ Data from Shoes Clean Verji.</span>
 </h3>

 
</body>
</html>



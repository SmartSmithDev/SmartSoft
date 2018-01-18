<!DOCTYPE html>
<html>
<head>
  <title>Invoice</title>
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
  <link rel="stylesheet" href="{{ asset('css/font-awesome.min.css') }}">


<style type="text/css">
html,body{
  min-width:100%;
  min-height:100%;
}
  
  .invoice-header,.company-info,.buyer-info,header{
    text-align: center;
  }
  .seller-info,.general-info,.company-info,.buyer-info > div,.tax-info>div,footer{
    border:1px solid;

  }

  .seller-info span{
 margin-left:5%;
  }
  @page { margin-top: 400px;
         margin-bottom: 130px;
     }
header,
footer {
    width: 100%;
    text-align: center;
    position: fixed;
}
header {
    top: -400px;
    width: 100%;
}
footer {
    bottom:-125px;
    width: 100%;
    height: 100px;
   
}



div{
        page-break-inside: avoid;
    }


</style>
</head>
<body id='pdf'>

@include('partials.invoice.header')
@include('partials.invoice.footer')
@include('partials.invoice.billing')
@include('partials.invoice.content')


</body>
</html>

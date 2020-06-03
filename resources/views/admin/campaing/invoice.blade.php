<!DOCTYPE html>
<html>
<head>
  <title>Ksa FeniForm</title>
  <style type="text/css">
    .main{
      margin: 10px auto;
    }
    .left{
      float: left;
    }
    .right{
      float: right;
    }
    .footer{
     width: 100%;
      margin-top: 10px;
    }
    #customers {
  font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
  width: 50%;
   margin-right: 10px;

}

#customers td, #customers th {
  padding: 8px;
 
}
#customers td{
  border-bottom: 1px solid black;
}

#customers tr:nth-child(even){background-color: #f2f2f2;}

#customers tr:hover {background-color: #ddd;}

#customers th {
  padding-top: 12px;
  padding-bottom: 12px;
  text-align: center;
  background-color: #4CAF50;
  color: white;
}


#customers2 {
  font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
  width: 50%;

}

#customers2 td, #customers2 th {
  padding: 8px;
}

#customers2 td{
  border-bottom: 1px solid black;
}

#customers2 tr:nth-child(even){background-color: #f2f2f2;}

#customers2 tr:hover {background-color: #ddd;}

#customers2 th {
  padding-top: 12px;
  padding-bottom: 12px;
  text-align: center;
  background-color: #4CAF50;
  color: white;
}
  </style>
</head>
<body>
       <div class="main">
        <div class="header">
          <img  width="700px" src="upload/logo.png">
          <h2 style="font-family:Trebuchet MS, Arial, Helvetica, sans-serif;">Campaing Name: {{ $eventName->title }}</h2>
        </div>
         <div class="left">
           <h2 style="font-family:Trebuchet MS, Arial, Helvetica, sans-serif;">Donar List.......</h2>
     <table id="customers">
      <thead>
        <tr>
      <th>NO</th>
      <th>DONAR NAME</th>
      <th>AMOUNT</th>
    </tr>
      </thead>
   <tbody>
    @foreach($donation as $donar)
      <tr>
      <td width="5%">{{ $loop->index +1 }}</td>
      <td width="30%">{{ $donar->name }}</td>
      <td width="15%">{{ $donar->amount }}</td>
     </tr>
      @endforeach
   </tbody>
   <tfoot>
      <tr>
      <th colspan="2">Total</th>
      <th>{{ $donationTotal }}</th>
    </tr>
   </tfoot>
</table>
         
         </div>
         <div class="right">
           <h2 style="font-family:Trebuchet MS, Arial, Helvetica, sans-serif;">Expense Details.......</h2>
      <table id="customers2">
      <thead>
        <tr>
        <th>NO</th>
        <th>DETAILS</th>
        <th>EXPENSE</th>
      </tr>
      </thead>
      <tbody>
        @foreach($eventExpense as $expense)
        <tr>
        <td width="5%">{{ $loop->index +1 }}</td>
        <td width="30%">{{ $expense->expense_details }}</td>
        <td width="15%">{{ $expense->expense }}</td>
      </tr>
     @endforeach
       
      </tbody>
      <tfoot>
        <tr>
        <th colspan="2">Total Expense</th>
        <th>{{ $eventExpenseTotal }}</th>
      </tr>
      <tr>
          <th colspan="2">Surplus</th>
          <th>{{ $donationTotal-$eventExpenseTotal }}</th>
      </tr>
      </tfoot>
   </table>
      
       </div>
      </div> 
         </div>
    
</body>
</html>
<table class="table">
   <thead class="table-dark">
      <tr>
         <th>Date</th>
         <th>Title</th>
         <th>Category</th>
         <th>Amount</th>
      </tr>
   </thead>
   <tbody>

      @foreach($allData as $data)
      <tr>
         <td>{{ date('d-m-Y',strtotime($data->income_date))  }}</td>
         <td>{{ $data->income_title }}</td>
         <td>{{ $data->categoryInfo->income_cate_name }}</td>
         <td>{{ number_format($data->income_amount,2)  }}</td>
      </tr>
      @endforeach
   </tbody>
</table>
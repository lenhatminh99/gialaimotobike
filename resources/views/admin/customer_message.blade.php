 @extends('admin_layout')
 @section('content')
     <section class="panel">
         <header class="panel-heading wht-bg">
             <h4 class="gen-case">Hộp thư góp ý của khách hàng
             </h4>
         </header>
         <div class="panel-body minimal">
             <div class="table-inbox-wrap">
                 <table class="table table-inbox table-hover">
                     <tbody>
                         <tr class="unread">
                             <th>Email</th>
                             <th>Tên khách hàng</th>
                             <th>Địa chỉ</th>
                             <th>Nội dung</th>
                         </tr>
                         @foreach ($customer_message as $key => $message)
                             <tr class="breadcrumb">
                                 <td class="view-message"><a href="#">{{ $message->email_contact }}</a></td>
                                 <td class="view-message"><a href="#">{{ $message->username_contact }}</a></td>
                                 <td class="view-message"><a href="#">{{ $message->address_contact }}</a></td>
                                 <td class="view-message"><a href="#">{{ $message->content_contact }}</a></td>
                             </tr>
                         @endforeach
                     </tbody>
                 </table>
             </div>
         </div>
     </section>
 @endsection

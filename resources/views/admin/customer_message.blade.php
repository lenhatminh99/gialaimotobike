 @extends('admin_layout')
 @section('content')
     <section class="panel">
         <header class="panel-heading wht-bg">
             <h4 class="gen-case">Hộp thư góp ý của khách hàng
                 <form action="#" class="pull-right mail-src-position">
                     <div class="input-append">
                         <input type="text" class="form-control " placeholder="Search Mail">
                     </div>
                 </form>
             </h4>
         </header>
         <div class="panel-body minimal">
             <div class="mail-option">
                 <div class="chk-all">
                     <div class="pull-left mail-checkbox ">
                         <input type="checkbox" class="">
                     </div>

                     <div class="btn-group">
                         <a data-toggle="dropdown" href="#" class="btn mini all">
                             All
                             <i class="fa fa-angle-down "></i>
                         </a>
                         <ul class="dropdown-menu">
                             <li><a href="#"> None</a></li>
                             <li><a href="#"> Read</a></li>
                             <li><a href="#"> Unread</a></li>
                         </ul>
                     </div>
                 </div>

                 <div class="btn-group">
                     <a data-original-title="Refresh" data-placement="top" data-toggle="dropdown" href="#"
                         class="btn mini tooltips">
                         <i class=" fa fa-refresh"></i>
                     </a>
                 </div>
                 <div class="btn-group hidden-phone">
                     <a data-toggle="dropdown" href="#" class="btn mini blue">
                         More
                         <i class="fa fa-angle-down "></i>
                     </a>
                     <ul class="dropdown-menu">
                         <li><a href="#"><i class="fa fa-pencil"></i> Mark as Read</a></li>
                         <li><a href="#"><i class="fa fa-ban"></i> Spam</a></li>
                         <li class="divider"></li>
                         <li><a href="#"><i class="fa fa-trash-o"></i> Delete</a></li>
                     </ul>
                 </div>
                 <div class="btn-group">
                     <a data-toggle="dropdown" href="#" class="btn mini blue">
                         Move to
                         <i class="fa fa-angle-down "></i>
                     </a>
                     <ul class="dropdown-menu">
                         <li><a href="#"><i class="fa fa-pencil"></i> Mark as Read</a></li>
                         <li><a href="#"><i class="fa fa-ban"></i> Spam</a></li>
                         <li class="divider"></li>
                         <li><a href="#"><i class="fa fa-trash-o"></i> Delete</a></li>
                     </ul>
                 </div>

                 <ul class="unstyled inbox-pagination">
                     <li><span>1-50 of 124</span></li>
                     <li>
                         <a class="np-btn" href="#"><i class="fa fa-angle-left  pagination-left"></i></a>
                     </li>
                     <li>
                         <a class="np-btn" href="#"><i class="fa fa-angle-right pagination-right"></i></a>
                     </li>
                 </ul>
             </div>
             <div class="table-inbox-wrap ">
                 <table class="table table-inbox table-hover">
                     <tbody>
                         @foreach ($customer_message as $key => $cusmess)
                             <tr class="unread">
                                 <td class="inbox-small-cells">
                                     <input type="checkbox" class="mail-checkbox">
                                 </td>
                                 <td class="inbox-small-cells"><i class="fa fa-star"></i></td>
                                 <td class="view-message  dont-show"><a href="#">{{ $cusmess->message_id }}</a></td>
                                 <td class="view-message "><a href="#">{{ $cusmess->message_content }}</a></td>
                                 <td class="view-message  inbox-small-cells"><i class="fa fa-paperclip"></i></td>
                                 <td class="view-message  text-right">12.10 AM</td>
                             </tr>
                         @endforeach
                     </tbody>
                 </table>
             </div>
         </div>
     </section>
 @endsection

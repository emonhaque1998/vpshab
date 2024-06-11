<x-app-layout>
    <!--breadcrumb-->
    <x-breadcrumb pageName="Order Details" />
    <!--end breadcrumb-->


      <div class="card">
        <div class="card-header py-3">
          <div class="d-flex g-3 align-items-center">
            <div class="col-12 col-lg-4 col-md-6 me-auto">
              <h5 class="mb-1">{{ $order->invoice->created_at->format("d-M-Y, h:i A") }}</h5>
              <p class="mb-0">Order ID : {{ $order->invoice->orderId }}</p>
              <a href="{{ url("admin/products/send-reminder/" . $order->invoice->id) }}">Send Reminder</a>
            </div>
            <div>
              @if($order->status === "Successfull")
                <button type="button" data-bs-toggle="modal" class="btn alert-success radius-30 px-4" data-bs-target="#staticBackdrop">Confirmed</button>
              @else
                <form class="row col-12 col-lg-12 col-12 col-md-12 g-3 align-items-right" method="POST" action="{{ url("admin/orders/all-orders/$order->id") }}">
                  @csrf
                  @method("PUT")
                  <div class="">
                  <input type="hidden" name="invoiceId" value="{{ $order->invoice->id }}">
                  <select class="form-select" name="orderStatusUpdate">
                      <option value="Successfull">Successfull</option>
                  </select>
                  </div>
                  <div class="">
                      <x-submit btnId="statusUpdateSubmitBtn" btnText="Save" />
                  </div>
                </form>
            @endif
            </div>
          </div>
         </div>
        <div class="card-body">
            <div class="row row-cols-1 row-cols-xl-2 row-cols-xxl-3">
               <div class="col">
                 <div class="card border shadow-none radius-10">
                   <div class="card-body">
                    <div class="d-flex align-items-center gap-3">
                      <div class="icon-box bg-light-primary border-0">
                        <i class="bi bi-person text-primary"></i>
                      </div>
                      <div class="info">
                         <h6 class="mb-2">Customer</h6>
                         <p class="mb-1">{{ $order->user->name }}</p>
                         <p class="mb-1">{{ $order->user->email }}</p>
                         <p class="mb-1">{{ $order->user->mobile }}</p>
                      </div>
                   </div>
                   </div>
                 </div>
               </div>
               <div class="col">
                <div class="card border shadow-none radius-10">
                  <div class="card-body">
                    <div class="d-flex align-items-center gap-3">
                      <div class="icon-box bg-light-success border-0">
                        <i class="bi bi-truck text-success"></i>
                      </div>
                      <div class="info">
                         <h6 class="mb-2">Order info</h6>
                         <p class="mb-1"><strong>Note</strong> : {{ $order->invoice->note }}</p>
                         <p class="mb-1"><strong>Pay Method</strong> : Master Card</p>
                         <p class="mb-1"><strong>Status</strong> : {{ $order->status }}</p>
                      </div>
                   </div>
                   </div>
                  </div>
               </div>
          </div><!--end row-->

          <div class="row">
              <div class="col-12 col-lg-8">
                <button type="button" data-bs-toggle="modal" style="width: 220px" class="btn alert-success radius-30 px-4" data-bs-target="#discount">Discount</button>
                 <div class="card border shadow-none radius-10">
                   <div class="card-body">
                       <div class="table-responsive">
                         <table class="table align-middle mb-0">
                           <thead class="table-light">
                             <tr>
                               <th>Product</th>
                               <th>Category</th>
                               <th>Unit Price</th>
                               <th>Fresh IP</th>
                               <th>Total</th>
                             </tr>
                           </thead>
                           <tbody>
                             <tr>
                               <td>
                                <div>
                                    <P class="mb-0 product-title">{{ $order->product->title }}</P>
                                </div>
                               </td>
                               <td>
                                <div>
                                    <P class="mb-0 product-title">{{ $order->product->category->category_name }}</P>
                                </div>
                               </td>
                               <td>${{ $order->product->monthly_price }}</td>
                               <td>
                                @if ($order->invoice->freshIp)
                                    ${{ $order->product->freshIP_amount }}
                                @else
                                    No
                                @endif
                               </td>
                               <td>
                                @if ($order->invoice->freshIp)
                                    ${{ $order->product->freshIP_amount + $order->product->monthly_price }}
                                @else
                                    ${{ $order->product->monthly_price }}
                                @endif

                               </td>
                             </tr>
                           </tbody>
                         </table>
                       </div>
                   </div>
                 </div>
              </div>
              <div class="col-12 col-lg-4">
                <div class="card border shadow-none bg-light radius-10">
                  <div class="card-body">
                      <div class="d-flex align-items-center mb-4">
                         <div>
                            <h5 class="mb-0">Order Summary</h5>
                         </div>
                         <div class="ms-auto">
                            @if($order->status === "Successfull")
                                <button type="button" data-bs-toggle="modal" class="btn alert-success radius-30 px-4" data-bs-target="#extendDueDate">Expend</button>
                            @else
                                <button type="button" data-bs-toggle="modal" class="btn alert-success radius-30 px-4" data-bs-target="#staticBackdrop">Confirmed</button>
                            @endif

                        </div>
                      </div>
                        <div class="d-flex align-items-center mb-3">
                          <div>
                            <p class="mb-0">Price</p>
                          </div>
                          <div class="ms-auto">
                            <h5 class="mb-0">${{ $order->product->monthly_price . ".00" }}</h5>
                        </div>
                      </div>
                      <div class="d-flex align-items-center mb-3">
                        <div>
                          <p class="mb-0">Fresh IP</p>
                        </div>
                        <div class="ms-auto">
                          <h5 class="mb-0">
                            @if ($order->invoice->freshIp)
                                ${{ $order->product->freshIP_amount . ".00" }}
                            @else
                                ${{ "0.00" }}
                            @endif
                          </h5>
                      </div>
                    </div>
                      <div class="d-flex align-items-center mb-3">
                        <div>
                          <p class="mb-0">Taxes</p>
                        </div>
                        <div class="ms-auto">
                          <h5 class="mb-0">$00.00</h5>
                      </div>
                    </div>

                    <div class="d-flex align-items-center mb-3">
                      <div>
                        <p class="mb-0">Discount</p>
                      </div>
                      <div class="ms-auto">
                        <h5 class="mb-0 text-danger">-$00.00</h5>
                    </div>
                  </div>
                  </div>
                </div>




             </div>
          </div><!--end row-->

        </div>
      </div>


    <!-- Modal -->
    <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
        <div class="modal-content">
        <form action="{{ url("admin/products/give-ip/$order->id") }}" method="POST">
            @csrf
            @method("put")
            <div class="modal-header">
            <h5 class="modal-title" id="staticBackdropLabel">Given IP</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <input class="form-control mb-3" type="text" name="ipAddress" placeholder="IP Address">
                <input class="form-control mb-3" type="text" name="key" placeholder="Api Key">
                <input class="form-control" type="text" name="hash" placeholder="Api Hash">
            </div>
            <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            <x-submit btnId="giveIpBtn" btnText="Give IP" />
            </div>
        </form>
        </div>
        </div>
    </div>


    <div class="modal fade" id="extendDueDate" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
        <div class="modal-content">
            @php
                $expendUrl = "admin/orders/all-orders/" . $order->invoice->id . "/edit"
            @endphp
        <form action="{{ url($expendUrl) }}" method="GET">
            @csrf
            <input type="hidden" value="{{ $order->id }}" name="orderId">
            <div class="modal-header">
            <h5 class="modal-title" id="staticBackdropLabel">Expend Date</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <input class="form-control" type="number" name="dueDate" placeholder="Enput Add Days">
            </div>
            <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            <x-submit btnId="updateDate" btnText="Update" />
            </div>
        </form>
        </div>
        </div>
    </div>

    <div class="modal fade" id="discount" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
      <div class="modal-dialog">
      <div class="modal-content">
      <form action="/admin/orders/all-orders/" method="POST">
          @csrf
          <input type="hidden" value="{{ $order->id }}" name="orderId">
          <div class="modal-header">
          <h5 class="modal-title" id="staticBackdropLabel">Give Discount</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
              <input class="form-control" type="number" name="disAount" placeholder="Discount Ammount" value="{{ $order->discount_amount ?? "" }}">
          </div>
          <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          <x-submit btnId="updateDate" btnText="Update" />
          </div>
      </form>
      </div>
      </div>
  </div>

<!--end page main-->
</x-app-layout>

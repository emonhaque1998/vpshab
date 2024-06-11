<x-app-layout>

    <!--start email wrapper-->
    <div class="email-wrapper">
     <div class="email-sidebar">
         <div class="email-sidebar-header d-grid"> <a href="javascript:;" class="btn btn-primary"><i class="bi bi-plus-lg me-2"></i>Add Support</a>
         </div>
         <div class="email-sidebar-content">
             <div class="email-navigation">
                 <div class="list-group list-group-flush"> 
                     @isset($supports)
                         @foreach ($supports as $support)
                         <a href="{{ url("/admin/messages/$support->slug") }}" class="list-group-item {{ request()->is('admin/messages/1') ? 'active' : '' }} d-flex align-items-center"><i class='bx bxs-inbox me-3 font-20'></i><span>{{ $support->name }}</span><span class="badge bg-primary rounded-pill ms-auto">{{ $support->contact->count() }}</span></a>
                         @endforeach
                     @endisset
                 </div>
             </div>
             
         </div>
     </div>
     <div class="email-header d-xl-flex align-items-center">
         
         <div class="flex-grow-1 mx-xl-2 my-2 my-xl-0">
             <div class="input-group">	<span class="input-group-text bg-transparent"><i class="bi bi-search"></i></span>
                 <input type="text" class="form-control" placeholder="Search mail">
             </div>
         </div>
         
     </div>
     {{ $slot }}
     <!--start compose mail-->
     <div class="compose-mail-popup">
         <div class="card">
             <div class="card-header bg-dark text-white py-2 cursor-pointer">
                 <div class="d-flex align-items-center">
                     <div class="compose-mail-title">New Message</div>
                     <div class="compose-mail-close ms-auto">x</div>
                 </div>
             </div>
             <div class="card-body">
                 <div class="email-form">
                     <div class="mb-3">
                         <input type="text" class="form-control" placeholder="To" />
                     </div>
                     <div class="mb-3">
                         <input type="text" class="form-control" placeholder="Subject" />
                     </div>
                     <div class="mb-3">
                         <textarea class="form-control" placeholder="Message" rows="10" cols="10"></textarea>
                     </div>
                     <div class="mb-0">
                         <div class="d-flex align-items-center">
                             <div class="">
                                 <div class="btn-group">
                                     <button type="button" class="btn btn-primary">Action</button>
                                     <button type="button" class="btn btn-primary split-bg-primary dropdown-toggle dropdown-toggle-split" data-bs-toggle="dropdown">	<span class="visually-hidden">Toggle Dropdown</span>
                                     </button>
                                     <div class="dropdown-menu">	<a class="dropdown-item" href="javascript:;">Action</a>
                                         <a class="dropdown-item" href="javascript:;">Another action</a>
                                         <a class="dropdown-item" href="javascript:;">Something else here</a>
                                         <div class="dropdown-divider"></div>	<a class="dropdown-item" href="javascript:;">Separated link</a>
                                     </div>
                                 </div>
                             </div>
                             <div class="ms-2">
                                 <button type="button" class="btn border-0 btn-sm btn-white"><i class="lni lni-text-format"></i>
                                 </button>
                                 <button type="button" class="btn border-0 btn-sm btn-white"><i class='bx bx-link-alt'></i>
                                 </button>
                                 <button type="button" class="btn border-0 btn-sm btn-white"><i class="lni lni-emoji-tounge"></i>
                                 </button>
                                 <button type="button" class="btn border-0 btn-sm btn-white"><i class="lni lni-google-drive"></i>
                                 </button>
                             </div>
                             <div class="ms-auto">
                                 <button type="button" class="btn border-0 btn-sm btn-white"><i class="lni lni-trash"></i>
                                 </button>
                             </div>
                         </div>
                     </div>
                 </div>
             </div>
         </div>
     </div>
     <!--end compose mail-->
     <!--start email overlay-->
     <div class="overlay email-toggle-btn-mobile"></div>
     <!--end email overlay-->
 </div>
 <!--end email wrapper-->
         @push('scripts')
             <script src="{{ asset("admin/assets/js/app-emailbox.js") }}"></script>
             <script src="{{ asset("admin/assets/js/app-emailread.js") }}"></script>
         @endpush
 </x-app-layout>
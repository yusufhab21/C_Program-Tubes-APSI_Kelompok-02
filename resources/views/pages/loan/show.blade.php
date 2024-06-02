@extends('layouts.app')
@section('content')
    <div class="grid md:grid-cols-12 lg:grid-cols-12 xl:grid-cols-12 gap-4 mb-4">
        <div class="sm:col-span-12  md:col-span-12 lg:col-span-12 xl:col-span-12 ">
            <div
                class="bg-white dark:bg-gray-900 border border-slate-200 dark:border-slate-700/40  rounded-md w-full relative">
                <div class="border-b border-slate-200 dark:border-slate-700/40 py-3 px-4 dark:text-slate-300/70">
                    <h4 class="font-medium">Detail Pinjaman</h4>
                </div><!--end header-title-->
                <div class="flex-auto p-4">
                    <div class="grid md:grid-cols-12 lg:grid-cols-12 xl:grid-cols-12 gap-4">
                        <div class="sm:col-span-12  md:col-span-12 lg:col-span-6 xl:col-span-6 text-center">
                            <div id="img-container" class="w-[400px] text-center inline-block mx-auto"
                                style="position: relative;">

                                @unless ($bookLoan->book->image_pat === null)
                                    <img src="{{ asset('storage/cover_images/' . $bookLoan->book->image_pat) }}"
                                        alt="{{ $bookLoan->book->title }}" style="width: 400px; height: 400px;"
                                        class="img-responsive">
                                @else
                                    <img src="https://via.placeholder.com/640x480.png/F6F5F2?text=NoImageAvailable"
                                        alt="No Image" style="width: 400px; height: 400px;" class="img-responsive">
                                @endunless


                                <div class="js-image-zoom__zoomed-area"
                                    style="background: white; opacity: 0.4; position: absolute; width: 200px; height: 200px; top: 26px; left: 0px; display: none;">
                                </div>
                                <div class="js-image-zoom__zoomed-image"
                                    style="background-image: url(&quot;http://127.0.0.1:5501/assets/images/products/02.png&quot;); background-repeat: no-repeat; display: none; position: absolute; top: 0px; right: 0px; transform: translateX(100%); width: 400px; height: 400px; background-size: 800px 800px; background-position: 0px -52px;">
                                    @unless ($bookLoan->book->image_pat === null)
                                        <img src="{{ asset('storage/cover_images/' . $bookLoan->book->image_pat) }}"
                                            alt="{{ $bookLoan->book->title }}" class="img-responsive">
                                    @else
                                        <img src="https://via.placeholder.com/640x480.png/F6F5F2?text=NoImageAvailable"
                                            alt="No Image" class="img-responsive">
                                    @endunless
                                </div>
                            </div>
                        </div>
                        <div class="sm:col-span-12  md:col-span-12 lg:col-span-6 xl:col-span-6 self-center">
                            <span class="bg-green-600/5 text-green-500 text-[14px] font-medium px-2.5 py-0.5 rounded h-5">by
                                : {{ $bookLoan->user->name }}</span>
                            <div class="flex flex-col gap-4">
                                <h5 class="dark:text-slate-200 font-medium text-[30px] leading-9 mt-4">
                                    {{ $bookLoan->book->title }}
                                </h5>

                                <h6 class="text-sm font-medium text-slate-800 dark:text-slate-400">Author :
                                    {{ $bookLoan->loan_date }}</h6>
                                <h6 class="text-sm font-medium text-slate-800 dark:text-slate-400">Publisher Name :
                                    {{ $bookLoan->deadline_date }}</h6>
                                <h6 class="text-sm font-medium text-slate-800 dark:text-slate-400">Tanggal Pengembalian :
                                    @if ($bookLoan->return_date)
                                        {{ $bookLoan->return_date }}
                                    @else
                                        <span class="badge bg-danger">Belum Dikembalikan</span>
                                    @endif
                                    <h6 class="text-sm font-medium text-slate-800 dark:text-slate-400">Status Peminjaman:
                                        @if ($bookLoan->borrowed_status == 'borrowed')
                                            <span class="badge bg-info">Borrowed</span>
                                        @elseif($bookLoan->borrowed_status == 'pending')
                                            <span class="badge bg-warning">Pending</span>
                                        @elseif($bookLoan->borrowed_status == 'rejected')
                                            <span class="badge bg-danger">Rejected</span>
                                        @else
                                            <span class="badge bg-success">Returned</span>
                                        @endif
                                    </h6>
                                    <h6 class="text-sm font-medium text-slate-800 dark:text-slate-400">Jumlah:
                                        {{ $bookLoan->jumlah }}</h6>
                                    <h6 class="text-sm font-medium text-slate-800 dark:text-slate-400">Peminjam :
                                        {{ $bookLoan->user->name }}</h6>



                                    <a href="{{ route('donation.list') }}"
                                        class="inline-block focus:outline-none text-slate-600 hover:bg-brand-500 hover:text-white bg-transparent border border-gray-200 dark:bg-transparent dark:text-slate-400 dark:hover:text-white dark:border-gray-700 dark:hover:bg-brand-500  text-sm font-medium py-2 px-3 rounded"><i
                                            class="ti ti-shopping-cart"></i> Back</a>
                            </div>
                        </div>
                    </div>
                </div><!--end card-body-->
            </div> <!--end card-->
        </div><!--end col-->
    </div>
@endsection

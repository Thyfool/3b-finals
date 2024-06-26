<x-app-layout>
    <section class="section dashboard">
        <x-slot name="header">
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                {{ __('Dashboard') }}
            </h2>
        </x-slot>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-red dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900 dark:text-gray-100">                
                        <div class="mx-auto" style="width: 800px;" >
                            <div class="row mt-4">
                                <!-- Sales Card -->
                                <div class="col-xxl-4 col-md-6">
                                    <div class="card info-card sales-card">
                                        <div class="card-body">
                                            <h5 class="card-title">Number of Post:</h5>

                                            <div class="d-flex align-items-center">
                                                <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                                <i class="bi bi-pencil"></i>
                                                </div>
                                                <div class="ps-3">
                                                    <h6>{{ $totalPosts }}</h6>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                </div><!-- End Sales Card -->

                                <div class="col-xxl-4 col-md-6">
                                    <div class="card info-card sales-card">
                                        <div class="card-body">
                                            <h5 class="card-title">Unpublished Post:</span></h5>

                                            <div class="d-flex align-items-center">
                                                <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                                <i class="fas fa-eye-slash"></i>
                                                </div>
                                                <div class="ps-3">
                                                    <h6>{{ $totalUnpublishedPosts }}</h6>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                </div><!-- End Sales Card -->

                                <div class="col-xxl-4 col-md-6">
                                    <div class="card info-card sales-card">
                                        <div class="card-body">
                                            <h5 class="card-title">Published Post:</h5>

                                            <div class="d-flex align-items-center">
                                                <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                                <i class="fas fa-eye"></i>
                                                </div>
                                                <div class="ps-3">
                                                    <h6>{{ $totalPublishedPosts }}</h6>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</x-app-layout>

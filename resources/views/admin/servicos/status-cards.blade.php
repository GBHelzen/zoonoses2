<div>
    {{-- Be like water. --}}
    <div class=" -my-2 flex items-center">
        <div class="max-w-7xl w-full  py-6 ">
            <div class="flex flex-col lg:flex-row w-full lg:space-x-2 space-y-2 lg:space-y-0 mb-2 lg:mb-4">

                <div class="w-full lg:w-1/5">
                    <div
                        class="widget w-full p-4 rounded-lg bg-white border border-gray-100 dark:bg-gray-900 dark:border-gray-800">
                        <div class="flex flex-row items-center justify-between">
                            <div class="flex flex-col">
                                <div class="text-xs uppercase font-light text-gray-500">
                                    Aguardando
                                </div>
                                <div class="text-xl font-bold">
                                    {{$aguardando}}
                                </div>
                            </div>
                            <svg class="stroke-current text-gray-500" fill="none" height="24" stroke="currentColor"
                                stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewbox="0 0 24 24"
                                width="24" xmlns="http://www.w3.org/2000/svg">
                                <polyline points="22 12 18 12 15 21 9 3 6 12 2 12">
                                </polyline>
                            </svg>
                        </div>
                    </div>
                </div>

                <div class="w-full lg:w-1/5">
                    <div
                        class="widget w-full p-4 rounded-lg bg-white border border-gray-100 dark:bg-gray-900 dark:border-gray-800">
                        <div class="flex flex-row items-center justify-between">
                            <div class="flex flex-col">
                                <div class="text-xs uppercase font-light text-gray-500">
                                    Agendadas
                                </div>
                                <div class="text-xl font-bold">
                                    {{$agendado}}
                                </div>
                            </div>
                            <svg class="stroke-current text-gray-500" fill="none" height="24" stroke="currentColor"
                                stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewbox="0 0 24 24"
                                width="24" xmlns="http://www.w3.org/2000/svg">
                                <polyline points="22 12 18 12 15 21 9 3 6 12 2 12">
                                </polyline>
                            </svg>
                        </div>
                    </div>
                </div>

                <div class="w-full lg:w-1/5">
                    <div
                        class="widget w-full p-4 rounded-lg bg-white border border-gray-100 dark:bg-gray-900 dark:border-gray-800">
                        <div class="flex flex-row items-center justify-between">
                            <div class="flex flex-col">
                                <div class="text-xs uppercase font-light text-gray-500">
                                    Para castração
                                </div>
                                <div class="text-xl font-bold">
                                    {{$para_castracao}}
                                </div>
                            </div>
                            <svg class="stroke-current text-gray-500" fill="none" height="24" stroke="currentColor"
                            stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewbox="0 0 24 24"
                            width="24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M14.121 14.121L19 19m-7-7l7-7m-7 7l-2.879 2.879M12 12L9.121 9.121m0 5.758a3 3 0 10-4.243 4.243 3 3 0 004.243-4.243zm0-5.758a3 3 0 10-4.243-4.243 3 3 0 004.243 4.243z" />
                              </svg>
                        </div>
                    </div>
                </div>

                <div class="w-full lg:w-1/5">
                    <div
                        class="widget w-full p-4 rounded-lg bg-white border border-gray-100 dark:bg-gray-900 dark:border-gray-800">
                        <div class="flex flex-row items-center justify-between">
                            <div class="flex flex-col">
                                <div class="text-xs uppercase font-light text-gray-500">
                                    Confirmadas
                                </div>
                                <div class="text-xl font-bold">
                                    {{$confirmado}}
                                </div>
                            </div>
                            <svg class="stroke-current text-gray-500" fill="none" height="24" stroke="currentColor"
                                stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewbox="0 0 24 24"
                                width="24" xmlns="http://www.w3.org/2000/svg">
                                <path d="M18 13v6a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V8a2 2 0 0 1 2-2h6">
                                </path>
                                <polyline points="15 3 21 3 21 9">
                                </polyline>
                                <line x1="10" x2="21" y1="14" y2="3">
                                </line>
                            </svg>
                        </div>
                    </div>
                </div>

                <div class="w-full lg:w-1/5">
                    <div
                        class="widget w-full p-4 rounded-lg bg-white border border-gray-100 dark:bg-gray-900 dark:border-gray-800">
                        <div class="flex flex-row items-center justify-between">
                            <div class="flex flex-col">
                                <div class="text-xs uppercase font-light text-gray-500">
                                    Canceladas
                                </div>
                                <div class="text-xl font-bold">
                                    {{$cancelado}}
                                </div>
                            </div>
                            <svg class="stroke-current text-gray-500" fill="none" height="24" stroke="currentColor"
                                stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewbox="0 0 24 24"
                                width="24" xmlns="http://www.w3.org/2000/svg">
                                <circle cx="12" cy="12" r="10">
                                </circle>
                                <polyline points="12 6 12 12 16 14">
                                </polyline>
                            </svg>
                        </div>
                    </div>
                </div>

                <div class="w-full lg:w-1/5">
                    <div
                        class="widget w-full p-4 rounded-lg bg-white border border-gray-100 dark:bg-gray-900 dark:border-gray-800">
                        <div class="flex flex-row items-center justify-between">
                            <div class="flex flex-col">
                                <div class="text-xs uppercase font-light text-gray-500">
                                    Total Solicitações
                                </div>
                                <div class="text-xl font-bold">
                                    {{$total}}
                                </div>
                            </div>
                            <svg class="stroke-current text-gray-500" fill="none" height="24" stroke="currentColor"
                                stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewbox="0 0 24 24"
                                width="24" xmlns="http://www.w3.org/2000/svg">
                                <path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2">
                                </path>
                                <circle cx="9" cy="7" r="4">
                                </circle>
                                <path d="M23 21v-2a4 4 0 0 0-3-3.87">
                                </path>
                                <path d="M16 3.13a4 4 0 0 1 0 7.75">
                                </path>
                            </svg>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>

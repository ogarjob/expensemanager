<div>
    <div class="relative w-full h-full  md:h-auto max-w-5xl">
        <!-- Modal content -->
        <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
            <button onclick="Livewire.emit('closeModal')" type="button" class="absolute top-3 right-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-800 dark:hover:text-white" data-modal-hide="expensesCreate">
                <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                <span class="sr-only">Close modal</span>
            </button>
            <div class="px-6 py-6 lg:px-8">
                <h3 class="mb-4 text-xl font-medium text-gray-900 dark:text-white">Edit Expense</h3>
                <form class="space-y-6 x-submit" data-then="reload" action="{{ route('api.expenses.update', $expense) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6 lg:gap-8">
                        <div>
                            <div>
                                <label for="merchant" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Merchant</label>
                                <select id="merchant{{$expense->id}}" name="merchant" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white mb-3" required>
                                    <option></option>
                                    @foreach($expenses->pluck('merchant')->unique() as $merchant)
                                        <option value="{{ $merchant }}">{{ $merchant }}</option>
                                    @endforeach
                                </select>
                                <script>
                                    document.querySelector('#merchant{{$expense->id}}').value = "{{ $expense->merchant }}";
                                </script>
                            </div>
                            <div>
                                <label for="total" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Total</label>
                                <div class="relative">
                                        <span class="absolute inset-y-0  flex items-center pl-3">
                                            <span class="text-gray-400">₦</span>
                                        </span>
                                    <input id="total" value="{{ $expense->total }}" name="total" type="number" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white pl-8 mb-3" required>
                                </div>
                            </div>
                            <div>
                                <label for="date" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Date</label>
                                <input type="date" value="{{ $expense->date }}" name="date" id="date" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white mb-3" required>
                            </div>
                            <div>
                                <label for="comment" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Comment</label>
                                <textarea name="comment" id="comment" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white mb-3">{{ $expense->comment }}</textarea>
                            </div>
                        </div>
                        <div>
                            <div class="p-6 bg-white rounded-lg motion-safe:hover:scale-[1.01] transition-all duration-250 shadow-2xl shadow-gray-800/20">
                                <div class="overflow-y-auto overflow-x-hidden" style="max-height: 500px">
                                    <div class="flex justify-end">
                                        <label for="file-update" class="text-white text-xs font-bold mb-3 py-2 px-3 rounded bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-xs">
                                            Select receipt
                                        </label>
                                        <input name="receipt" id="file-update" type="file" class="hidden" accept="image/jpg, image/jpeg, image/png">
                                    </div>
                                    <div class="mt-4">
                                        <img id="img-preview" class="{{ $expense->receipt ? '' : 'hidden' }} w-full" src="{{ asset($expense->receipt) }}" alt="Image Preview">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <button onclick="Livewire.emit('closeModal')" type="button" class="text-gray-500 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg px-4 py-2.5 inline-flex items-center" data-modal-hide="expensesCreate">
                        Close
                    </button>
                    <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-4 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Save</button>
                </form>
            </div>
        </div>
    </div>
    <script >
        const fileUpload = document.getElementById('file-update');
        const imagePreview = document.getElementById('img-preview');

        fileUpload.addEventListener('change', function() {
            const file = this.files[0];

            if (file) {
                const reader = new FileReader();

                reader.addEventListener('load', function() {
                    imagePreview.setAttribute('src', this.result);
                    imagePreview.classList.remove('hidden');
                });

                reader.readAsDataURL(file);
            }
        });
    </script>
</div>

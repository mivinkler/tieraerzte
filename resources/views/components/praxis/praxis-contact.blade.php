<input type="checkbox" id="openModal" class="absolute peer invisible">
<label for="openModal" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded cursor-pointer">
    Termin anfragen
</label>

<!-- Модальное окно для формы-->
<div class="fixed inset-0 bg-gray-600 bg-opacity-50 overflow-y-auto h-full w-full peer-checked:block z-10 hidden">
    <div class="relative top-20 mx-auto p-5 border w-[520px] shadow-lg rounded-md bg-white">
        <div class="flex justify-end">
            <label id="closeModal" for="openModal" class="text-gray-300 hover:text-gray-700 w-6 h-6 cursor-pointer">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 122.87 122.87"
                    class="fill-stone-500 hover:fill-stone-700">
                    <path
                        d="M18,18A61.45,61.45,0,1,1,0,61.44,61.28,61.28,0,0,1,18,18ZM77.38,39l6.53,6.54a4,4,0,0,1,0,5.63L73.6,61.44,83.91,71.75a4,4,0,0,1,0,5.63l-6.53,6.53a4,4,0,0,1-5.63,0L61.44,73.6,51.13,83.91a4,4,0,0,1-5.63,0L39,77.38a4,4,0,0,1,0-5.63L49.28,61.44,39,51.13a4,4,0,0,1,0-5.63L45.5,39a4,4,0,0,1,5.63,0L61.44,49.28,71.75,39a4,4,0,0,1,5.63,0ZM61.44,10.54a50.91,50.91,0,1,0,36,14.91,50.83,50.83,0,0,0-36-14.91Z" />
                </svg>
            </label>
        </div>

        <h3 class="mb-3 text-xl font-medium text-center">Termin anfragen</h3>
        <div class="px-5 pb-3 pt-6 text-[14px]">
            <form id="contactForm" action="{{ route('contact.praxis', $praxis->user->id) }}" method="POST">
                @csrf

                <div class="flex items-center mb-5">
                    <input id="earliest" value="Baldmöglichster Termin" name="earliest" type="checkbox"
                        class="accent-blue-500" onclick="toggleCheckbox('earliest')">
                    <label for="earliest" class="ms-2">Baldmöglichster Termin</label>
                </div>
                <div class="h-16">
                    <div class="flex items-center">
                        <input id="definite" name="termin" type="checkbox" class="accent-blue-500"
                            onclick="toggleCheckbox('definite')">
                        <span class="ms-2 flex items-center w-full gap-4">
                            <div>Datum und Zeit</div>
                            <div class="flex items-center gap-4">
                                <div class="flex text-sm gap-1">
                                    <input type="date" name="date" id="date"
                                        class="block w-28 rounded-sm border-0 px-1.5 py-1 text-gray-700 shadow-sm ring-1 ring-inset ring-gray-300 focus-visible:outline focus-visible-2 focus-visible:outline-offset-1 focus-visible:outline-indigo-500">
                                    <input type="time" name="time" id="time"
                                        class="block rounded-sm border-0 px-1.5 py-1 text-gray-700 shadow-sm ring-1 ring-inset ring-gray-300 focus-visible:outline focus-visible-2 focus-visible:outline-offset-1 focus-visible:outline-indigo-500">
                                </div>

                                <div class="text-xs">
                                    <div class="flex items-center mb-1">
                                        <input id="morning" name="tageszeit" type="radio" value="Vormittag"
                                            class="w-[11px] accent-blue-500"
                                            onMouseDown="this.isChecked=this.checked;"
                                            onClick="this.checked=!this.isChecked;">
                                        <label for="morning" class="ms-1.5 leading-none">Vormittag</label>
                                    </div>
                                    <div class="flex items-center">
                                        <input id="afternoon" name="tageszeit" type="radio" value="Nachmittag"
                                            class="w-[11px] accent-blue-500"
                                            onMouseDown="this.isChecked=this.checked;"
                                            onClick="this.checked=!this.isChecked;">
                                        <label for="afternoon" class="ms-1.5 leading-none">Nachmittag</label>
                                    </div>
                                </div>
                            </div>
                        </span>
                    </div>
                    @error('termin')
                        <div class="text-red-600 text-xs mt-1">{{ $message }}</div>
                    @enderror
                </div>

                <div class="flex gap-4 mb-6 justify-between">
                    <div class="basis-2/3">
                        <label for="tiername" class="block mb-1.5">Tiername:</label>
                        <input type="text" name="tiername" id="tiername" value="{{ old('tiername') }}"
                            class="block w-full rounded-sm border-0 px-1.5 py-1 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 focus-visible:outline focus-visible-2 focus-visible:outline-offset-1 focus-visible:outline-indigo-500">
                        @error('tiername')
                            <div class="text-red-600 text-xs">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="relative basis-1/3">
                        <label for="tierart" class="block mb-1.5">Tierart:</label>
                        <input type="text" id="tierart" name="tierart" autocomplete="off" list="tierart-list"
                            value="{{ old('tierart') }}"
                            class="block w-full rounded-sm border-0 px-1.5 py-1 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 focus-visible:outline focus-visible-2 focus-visible:outline-offset-1 focus-visible:outline-indigo-500">

                        <datalist id="tierart-list">
                            <option value="Hund">
                            <option value="Katze">
                            <option value="Kaninchen">
                            <option value="Hamster">
                            <option value="Meerschweinchen">
                        </datalist>

                        @error('tierart')
                            <div class="text-red-600 text-xs">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="mb-6 flex justify-between gap-4">
                    <div class="w-2/3">
                        <label for="email" class="block mb-1.5">Email:</label>
                        <input type="email" name="email" id="email" value="{{ old('email') }}"
                            class="block w-full rounded-sm border-0 px-1.5 py-1 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 focus-visible:outline focus-visible-2 focus-visible:outline-offset-1 focus-visible:outline-indigo-500">
                        @error('email')
                            <div class="text-red-600 text-xs">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="w-1/3">
                        <label for="tel" class="block mb-1.5">Telefon:</label>
                        <input type="tel" name="tel" id="tel" value="{{ old('tel') }}"
                            class="block w-full rounded-sm border-0 px-1.5 py-1 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 focus-visible:outline focus-visible-2 focus-visible:outline-offset-1 focus-visible:outline-indigo-500">
                        @error('tel')
                            <div class="text-red-600 text-xs">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="mb-4">
                    <label for="text" class="block mb-1.5">Mitteilung:</label>
                    <div class="mb-6">
                        <textarea name="text" maxlength="500" class="block w-full min-h-24 max-h-52 rounded-sm border-0 px-1.5 py-1 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 focus-visible:outline focus-visible-2 focus-visible:outline-offset-1 focus-visible:outline-indigo-500">{{ old('text') }}</textarea>
                        {{-- @include('components.form.textarea', ['name' => 'text', 'maxlength' => '500']) --}}
                        @error('text')
                            <div class="text-red-600 text-xs">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="flex justify-between items-start mb-3 text-xs leading-4.5 gap-8">
                    <p class="italic tracking-wide">*Ihre Daten werden ausschließlich zur Kontaktaufnahme mit der Tierarztpraxis genutzt, nicht für Werbung oder Newsletter.</p>
                    <button type="submit" id="submitBtn"
                        class="mt-1.5 h-fit py-1.5 px-4 bg-blue-500 hover:bg-blue-700 text-white font-bold rounded">
                        Senden
                    </button>
                </div>
            </form>
        </div>  
    </div>
</div>

<!-- Модальное окно подтверждения -->
    @if(Session::has('success'))
    <div id="successMessage" class="fixed inset-0 bg-gray-600 bg-opacity-50 overflow-y-auto">
        <div class="relative top-40 mx-auto p-5 border w-[500px] shadow-lg rounded-md bg-white">
            <div class="mt-3 text-center">
                <h3 class="text-lg leading-6 font-medium text-gray-900">{{ Session::get('success') }}</h3>
            </div>
        </div>
    </div>
    @endif

    @if(Session::has('error'))
    <div id="errorMessage" class="fixed inset-0 bg-gray-600 bg-opacity-50 overflow-y-auto">
        <div class="relative top-40 mx-auto p-5 border w-[500px] shadow-lg rounded-md bg-white">
            <div class="mt-3 text-center">
                <h3 class="text-lg leading-6 font-medium text-gray-900">{{ Session::get('error') }}</h3>
            </div>
        </div>
    </div>
    @endif

    <!-- Индикатор загрузки -->
    <div id="loadingIndicator" class="fixed inset-0 bg-gray-600 bg-opacity-50 overflow-y-auto hidden">
        <div class="relative top-40 mx-auto p-5 border w-[100px] shadow-lg rounded-md bg-white flex justify-center items-center">
            <svg class="animate-spin h-10 w-10 text-blue-500" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
            </svg>
        </div>
    </div>
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            // Получаем все необходимые элементы
            const earliest = document.getElementById("earliest");
            const definite = document.getElementById("definite");
            const date = document.getElementById("date");
            const time = document.getElementById("time");
            const morning = document.getElementById("morning");
            const afternoon = document.getElementById("afternoon");
    
            // Функция для переключения чекбоксов
            function toggleCheckbox(selectedCheckboxId) {
                if (selectedCheckboxId === "earliest") {
                    if (earliest.checked) {
                        definite.checked = false; // Снимаем отметку с другого чекбокса
                        clearAndDisableInputs(); // Очищаем и отключаем все поля ввода
                    } else {
                        enableInputs(); // Включаем все поля ввода
                    }
                } else if (selectedCheckboxId === "definite") {
                    if (definite.checked) {
                        earliest.checked = false; // Снимаем отметку с другого чекбокса
                        enableInputs(); // Включаем все поля ввода
                    } else {
                        disableInputs(); // Отключаем все поля ввода
                    }
                }
            }
    
            // Функция для очистки и отключения всех полей ввода
            function clearAndDisableInputs() {
                clearInputs(); // Очищаем все поля
                disableInputs(); // Отключаем все поля
            }
    
            // Функция для очистки всех полей ввода
            function clearInputs() {
                date.value = "";
                time.value = "";
                morning.checked = false;
                afternoon.checked = false;
            }
    
            // Функция для отключения всех полей ввода
            function disableInputs() {
                setInputState(true);
            }
    
            // Функция для включения всех полей ввода
            function enableInputs() {
                setInputState(false);
            }
    
            // Функция для установки состояния (включено/выключено) всех полей ввода
            function setInputState(state) {
                date.disabled = state;
                time.disabled = state;
                morning.disabled = state;
                afternoon.disabled = state;
            }
    
            // Функция для очистки поля времени, если выбрана радио-кнопка
            function clearTimeIfRadioSelected() {
                if (morning.checked || afternoon.checked) {
                    time.value = "";
                }
            }
    
            // Функция для снятия отметок с радио-кнопок, если введено время
            function clearRadioIfTimeSelected() {
                if (time.value) {
                    morning.checked = false;
                    afternoon.checked = false;
                }
            }
    
            // Функция для установки отметки на definite чекбоксе
            const setChecked = () => definite.checked = true;
    
            // Добавляем обработчики событий для полей ввода
            date.addEventListener("input", setChecked);
            time.addEventListener("input", () => {
                setChecked();
                clearRadioIfTimeSelected();
            });
            morning.addEventListener("click", () => {
                setChecked();
                clearTimeIfRadioSelected();
            });
            afternoon.addEventListener("click", () => {
                setChecked();
                clearTimeIfRadioSelected();
            });
    
            // Делаем функцию toggleCheckbox доступной глобально
            window.toggleCheckbox = toggleCheckbox;
        });
    </script>
    
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const contactForm = document.getElementById('contactForm');
            const openModalCheckbox = document.getElementById('openModal');
            const loadingIndicator = document.getElementById('loadingIndicator');

            // Обработчик для отправки формы
            contactForm.addEventListener('submit', function(event) {
                event.preventDefault();
                // Закрываем форму
                openModalCheckbox.checked = false;
                // Показываем индикатор загрузки
                loadingIndicator.classList.remove('hidden');

                // Отправляем данные на сервер
                contactForm.submit();
            });

            // Скрипт для автоматического закрытия сообщения об успехе через 3 секунды
            if (document.getElementById('successMessage')) {
                setTimeout(() => {
                    document.getElementById('successMessage').style.display = 'none';
                }, 3000);
            }

            if (document.getElementById('errorMessage')) {
                setTimeout(() => {
                    document.getElementById('errorMessage').style.display = 'none';
                }, 3000);
            }
        });
    </script>
</body>
</html>
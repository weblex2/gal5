<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit House') }}  {{ $house->house_number }}
        </h2>
    </x-slot>

    <div class="py-12 w-full">
        <div class="w-full mx-auto px-6">
            <div class="bg-white p-3 w-full overflow-hidden shadow-xl sm:rounded-lg">
                @if ($message = Session::get('success'))
                    <div class="flex alert alert-success items-center">
                        <p>{{ $message }}</p>
                    </div>
                @endif
                @include('house.frmHouse')
            </div>
        </div>
    </div>


    <script>
        const MONTH_NAMES = [
            "January",
            "February",
            "March",
            "April",
            "May",
            "June",
            "July",
            "August",
            "September",
            "October",
            "November",
            "December",
        ];
        const DAYS = ["SIn", "Mon", "Tue", "Wed", "Thu", "Fri", "Sat"];

        function app() {
            return {
                showDatepicker: false,
                datepickerValue: "",

                month: "",
                year: "",
                no_of_days: [],
                blankdays: [],
                days: ["SIn", "Mon", "Tue", "Wed", "Thu", "Fri", "Sat"],

                initDate() {
                    let today = new Date();
                    this.month = today.getMonth();
                    this.year = today.getFullYear();
                    this.datepickerValue = new Date(
                        this.year,
                        this.month,
                        today.getDate()
                    ).toDateString();
                },

                isToday(date) {
                    const today = new Date();
                    const d = new Date(this.year, this.month, date);

                    return today.toDateString() === d.toDateString() ? true : false;
                },

                getDateValue(date) {
                    let selectedDate = new Date(this.year, this.month, date);
                    this.datepickerValue = selectedDate.toDateString();

                    this.$refs.date.value =
                        selectedDate.getFullYear() +
                        "-" +
                        ("0" + selectedDate.getMonth()).slice(-2) +
                        "-" +
                        ("0" + selectedDate.getDate()).slice(-2);

                    console.log(this.$refs.date.value);

                    this.showDatepicker = false;
                },

                getNoOfDays() {
                    let daysInMonth = new Date(
                        this.year,
                        this.month + 1,
                        0
                    ).getDate();

                    // find where to start calendar day of week
                    let dayOfWeek = new Date(this.year, this.month).getDay();
                    let blankdaysArray = [];
                    for (var i = 1; i <= dayOfWeek; i++) {
                        blankdaysArray.push(i);
                    }

                    let daysArray = [];
                    for (var i = 1; i <= daysInMonth; i++) {
                        daysArray.push(i);
                    }

                    this.blankdays = blankdaysArray;
                    this.no_of_days = daysArray;
                },
            };
        }
    </script>

</x-app-layout>

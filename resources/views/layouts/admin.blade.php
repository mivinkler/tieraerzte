<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tierärzte</title>
    @vite('resources/css/app.css')
</head>
</head>

<body class="w-full">
    <div class="flex text-gray-700 fixed h-full w-full">
        <div class="flex flex-col items-center w-[3vw] pb-4">
            <div class="w-full h-16 bg-slate-500 shadow-b">
            </div>
            <div class="">
                <a class="flex items-center justify-center flex-shrink-0 w-10 h-10 mt-4 rounded hover:bg-gray-300" href="https://mailtrap.io/">
                    <svg class="w-5 h-5" xmlns="http://www.w3.org/2000/svg" fill-rule="evenodd" viewBox="0 0 122.88 81.51">
                        <title>Mailtrap</title>
                        <path d="M122.88,58.27l-23,23.24V69.93c-14.54-3-26,.31-34.76,11.37,1.51-22.75,17.06-33.73,34.76-34.46V35l23,23.23ZM6.68,0h93.6a6.54,6.54,0,0,1,2.54.51A6.72,6.72,0,0,1,105,2a6.65,6.65,0,0,1,2,4.72V26.4a.62.62,0,0,1-.62.62.66.66,0,0,1-.48-.22,9.31,9.31,0,0,0-2-1.61,9.77,9.77,0,0,0-2.36-1,.63.63,0,0,1-.45-.59V9.86L70.92,35.55l5.49,5.76a.63.63,0,0,1,0,.87l-.16.1c-.68.37-1.36.75-2,1.15s-1.32.82-2,1.26a.61.61,0,0,1-.82-.12l-5-5.21-10.21,8.7a2.92,2.92,0,0,1-3.76,0L41.72,39.34,9.35,71.8H52.93a.61.61,0,0,1,.62.61l0,.19c-.17.74-.33,1.48-.47,2.22v0c-.14.73-.27,1.51-.39,2.32a.62.62,0,0,1-.61.52H6.68a6.59,6.59,0,0,1-2.55-.51A6.83,6.83,0,0,1,2,75.72,6.72,6.72,0,0,1,.51,73.55v0A6.57,6.57,0,0,1,0,71V6.68A6.63,6.63,0,0,1,.51,4.13,6.83,6.83,0,0,1,2,2,6.94,6.94,0,0,1,4.13.51,6.59,6.59,0,0,1,6.68,0ZM5.89,67,37.15,35.61,5.89,10.12V67ZM10,5.89,54.29,42,96.69,5.89Z"/>
                    </svg>
                </a>
                <a class="flex items-center justify-center flex-shrink-0 w-10 h-10 mt-4 rounded hover:bg-gray-300" href="https://www.postman.com/">
                    <svg xmlns="http://www.w3.org/2000/svg" height="20" width="20" viewBox="0 0 24 24">
                        <title>Postman</title>
                        <path d="M12.023,24.001c-0.515,0-1.032-0.033-1.551-0.1C3.911,23.059-0.743,17.035,0.099,10.473c0.408-3.179,2.029-6.008,4.566-7.968c2.537-1.959,5.685-2.813,8.863-2.406c0,0,0,0,0,0c3.179,0.408,6.009,2.03,7.968,4.566c1.959,2.536,2.813,5.684,2.405,8.862c-0.407,3.179-2.028,6.008-4.564,7.968C17.213,23.135,14.663,24.001,12.023,24.001z M11.98,1.5c-2.31,0-4.541,0.757-6.398,2.192c-2.22,1.714-3.638,4.19-3.995,6.972c-0.737,5.741,3.335,11.013,9.077,11.749c2.78,0.359,5.537-0.391,7.756-2.105c2.22-1.714,3.638-4.19,3.994-6.971c0.357-2.782-0.39-5.536-2.104-7.755c-1.714-2.22-4.19-3.639-6.973-3.995C12.883,1.528,12.43,1.5,11.98,1.5z"></path><path fill="#71717a" d="M8.152,19c-0.003,0-0.007,0-0.01,0l-1.897-0.017c-0.082-0.001-0.163-0.015-0.239-0.041c-0.242-0.049-0.455-0.17-0.612-0.352c-0.239-0.273-0.34-0.546-0.34-0.828c0-0.052,0.005-0.11,0.016-0.161l0.036-0.171c0.011-0.05,0.026-0.098,0.046-0.145c0.05-0.111,0.103-0.192,0.149-0.252c0.028-0.045,0.061-0.088,0.099-0.128l0.855-0.881c0.012-0.014,0.024-0.027,0.037-0.04l2.081-2.143c-0.103-0.071-0.194-0.162-0.263-0.276c-0.289-0.478-0.168-1.038,0.361-1.663c0.252-0.308,3.147-3.147,3.834-3.685c0.739-0.572,1.341-0.927,2.064-0.933l0,0c0.665,0.008,1.282,0.267,1.713,0.767c0.459,0.532,0.679,1.274,0.574,1.938c-0.156,0.98-0.738,1.813-1.288,2.499c-0.633,0.777-1.434,1.582-2.205,2.337c-0.038,0.037-0.076,0.068-0.111,0.094c-0.021,0.024-0.04,0.046-0.053,0.059c-1.158,1.049-2.279,1.854-3.599,2.581l-0.008,0.204c-0.001,0.027-0.004,0.055-0.008,0.082c-0.022,0.269-0.132,0.516-0.315,0.704l-0.101,0.104C8.757,18.873,8.458,19,8.152,19z M7.896,17.606c0,0-0.001,0.001-0.001,0.002L7.896,17.606z M6.921,17.489l0.983,0.009l0.018-0.429c0.012-0.267,0.164-0.508,0.401-0.632c1.353-0.71,2.47-1.488,3.613-2.518c0.062-0.081,0.145-0.161,0.229-0.213c0.726-0.711,1.47-1.461,2.039-2.161c0.602-0.749,0.894-1.286,0.974-1.79c0.03-0.192-0.039-0.503-0.229-0.724c-0.145-0.168-0.297-0.262-0.563-0.246c0,0,0,0-0.001,0c-0.261,0.002-0.585,0.175-1.156,0.616c-0.496,0.389-2.377,2.22-3.206,3.051c0.326-0.024,0.634,0.157,0.758,0.463c0.133,0.325,0.023,0.699-0.266,0.9c-0.011,0.008-0.088,0.064-0.167,0.146l-2.986,3.075l-0.003-0.003L6.921,17.489z M14.378,8.036h0.01H14.378z"></path><path fill="#71717a" d="M17.315,8.786c-1.175,0-2.131-0.962-2.131-2.144S16.14,4.5,17.315,4.5s2.131,0.961,2.131,2.143S18.49,8.786,17.315,8.786z M17.315,6c-0.348,0-0.631,0.288-0.631,0.643s0.283,0.644,0.631,0.644s0.631-0.289,0.631-0.644S17.663,6,17.315,6z"></path><path d="M10.085,13.95c-0.355,0-0.671-0.254-0.737-0.616c-0.074-0.407,0.196-0.798,0.604-0.872l0.882-0.159l4.12-4.296c0.288-0.299,0.761-0.309,1.061-0.021c0.299,0.286,0.309,0.762,0.022,1.061l-4.288,4.471c-0.11,0.113-0.252,0.19-0.408,0.219l-1.121,0.203C10.175,13.946,10.13,13.95,10.085,13.95z"></path>
                    </svg>
                </a>
                <a class="flex items-center justify-center flex-shrink-0 w-10 h-10 mt-4 rounded hover:bg-gray-300" href="http://tieraerzte/telescope/requests">
                    <svg xmlns="http://www.w3.org/2000/svg" height="22" width="24" viewBox="0 0 64 64">
                        <path fill="#6c6b6b" d="M10.85 24.73l-7.29 3.01-.08-.2-.14-.35c-.08-.21-.28-.34-.49-.34-.07 0-.13.02-.2.05l-1.41.58C1.1 27.53 1 27.64.94 27.77c-.05.13-.05.27 0 .4l2.32 5.62c.06.13.15.24.29.29.13.06.27.06.4 0l1.41-.58c.13-.06.23-.15.29-.29.06-.13.06-.27 0-.4l-.24-.59 7.28-3.01L10.85 24.73zM29.05 26.89c.13.29.47.42.77.3l8.11-3.34-5.4-13.09-8.11 3.35c-.15.06-.26.18-.32.32-.06.14-.06.29-.01.43L29.05 26.89zM23.78 16.89l-12.29 5.07c-.14.05-.26.17-.31.31-.06.15-.06.31-.01.46l3.17 7.69c.13.3.47.44.77.32l12.28-5.07L23.78 16.89zM61.18 14.78l-5.78-14c0-.01 0-.01 0-.01l-.03-.06C55.19.27 54.76 0 54.31 0c-.15 0-.3.02-.44.09L33.93 8.31c-.59.25-.87.92-.63 1.51l.01.03h.01l5.81 14.11c.12.29.34.5.63.62.28.12.6.12.88 0l19.94-8.22c.59-.25.87-.92.63-1.51L61.18 14.78zM62.74 9.5l-2.51-6.07c-.7-1.7-2.23-2.71-3.6-2.5l5.32 12.89C63.07 13 63.45 11.2 62.74 9.5zM40.03 42.45l-.04.05c.25-.52.4-1.09.42-1.7h1.71c.83 0 1.5-.67 1.5-1.49s-.67-1.5-1.5-1.5H30.25c-.83 0-1.49.67-1.49 1.5s.67 1.49 1.49 1.49h1.72c.02.61.17 1.19.42 1.7l-.04-.06L18.71 62.38c-.32.47-.2 1.11.27 1.43.18.12.38.19.59.19.32 0 .65-.15.84-.45l13.28-19.44-.06-.08c.46.35.99.62 1.57.76h-.04v18.18c0 .57.46 1.03 1.03 1.03.57 0 1.03-.46 1.03-1.03V44.79h-.04c.58-.14 1.11-.4 1.57-.75l-.07.08 13.28 19.43c.32.47.97.6 1.43.27.47-.32.59-.96.27-1.43L40.03 42.45zM36.18 42.15c-.77 0-1.39-.6-1.46-1.36h2.92C37.58 41.55 36.95 42.15 36.18 42.15zM38.55 37.05v-1.7c.97-.73 1.59-1.88 1.59-3.19 0-1.9-1.33-3.48-3.11-3.88l-1.13-2.45-4.4 1.81 1.18 2.58v.02c-.31.56-.49 1.22-.49 1.91 0 1.31.62 2.46 1.59 3.19v1.7H38.55zM36.16 30.87c.71 0 1.3.57 1.3 1.29 0 .71-.58 1.3-1.3 1.3-.71 0-1.29-.58-1.29-1.3C34.88 31.44 35.45 30.87 36.16 30.87z"></path>
                    </svg>
                </a>
                <a class="flex items-center justify-center flex-shrink-0 w-10 h-10 mt-4 rounded hover:bg-gray-300" href="">
                    <svg xmlns="http://www.w3.org/2000/svg" height="22" width="24" viewBox="0 0 128 128" id="google-analytics"><path fill="#79797a" d="M93.947 90.985a12.925 12.925 0 0 1-12.857 12.993 12.362 12.362 0 0 1-1.591-.09 13.255 13.255 0 0 1-11.312-13.434V13.523A13.26 13.26 0 0 1 79.52.089a12.909 12.909 0 0 1 14.426 12.9Z" data-name="Path 172"></path><path fill="#a3a6ab" d="M12.882 78.236A12.882 12.882 0 1 1 0 91.118a12.882 12.882 0 0 1 12.882-12.882Zm33.893-39.044a13.256 13.256 0 0 0-12.527 13.545v34.6c0 9.391 4.133 15.09 10.187 16.3a12.9 12.9 0 0 0 15.209-10.084 12.61 12.61 0 0 0 .257-2.6v-38.81A12.925 12.925 0 0 0 47 39.192h-.225Z" data-name="Path 173"></path></svg>

                </a>
            </div>
        </div>
        <menu class="text-gray-700 flex flex-col w-[12vw]">
            <button class="relative text-sm focus:outline-none group bg-slate-500 hover:bg-slate-600">
                <div class="flex items-center justify-between w-full h-16">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-7 w-7 ml-10" viewBox="0 0 122.88 99.58" fill-rule="evenodd" fill="#f9fafb">
                        <path d="M8.45,0H99.16a8.47,8.47,0,0,1,8.44,8.45V34.92H107A24.52,24.52,0,0,0,99.9,36V26.33H8.05V81.47a2.32,2.32,0,0,0,2.34,2.34H58.21a24.93,24.93,0,0,0,1.35,8H8.45A8.47,8.47,0,0,1,0,83.33V8.45A8.47,8.47,0,0,1,8.45,0ZM44.71,46.1a4.25,4.25,0,1,1,6.06-6l11.76,12a4.23,4.23,0,0,1,0,6L51,69.79a4.25,4.25,0,1,1-6.06-6l4.49-4.57-22-.09a4.25,4.25,0,1,1,.07-8.5l21.76.08L44.71,46.1ZM94.58,59.23a3.3,3.3,0,0,1-4.67-4.65l5.88-5.89a15.87,15.87,0,0,1,22.46,22.44L112.34,77a3.3,3.3,0,0,1-4.64-4.68l5.88-5.88a9.33,9.33,0,0,0,0-13.11l-.16-.17a9.31,9.31,0,0,0-6.4-2.53,9.21,9.21,0,0,0-6.55,2.7l-5.89,5.88Zm6.6,1.7a3.3,3.3,0,0,1,4.66,4.66l-17,17a3.3,3.3,0,1,1-4.66-4.66l17-16.95ZM95.53,84.5a3.31,3.31,0,0,1,4.68,4.67L94.43,95A15.92,15.92,0,0,1,72.06,95l-.28-.29A15.89,15.89,0,0,1,72,72.5l5.77-5.78a3.3,3.3,0,0,1,4.67,4.67l-5.77,5.78a9.33,9.33,0,0,0-.17,13l.17.16a9.33,9.33,0,0,0,13.11,0l5.77-5.78Zm-4.41-75a4.17,4.17,0,1,1-4.18,4.17A4.17,4.17,0,0,1,91.12,9.5Zm-28.28,0a4.17,4.17,0,1,1-4.17,4.17A4.17,4.17,0,0,1,62.84,9.5ZM77,9.5a4.17,4.17,0,1,1-4.17,4.17A4.17,4.17,0,0,1,77,9.5Z"/>
                    </svg>
                </div>
                <div class="absolute z-10 border font-semibold text-left border-gray-300 flex-col pb-12 items-start hidden w-full bg-white shadow-lg group-focus:flex">
                    <div class="hover:bg-gray-300 w-full py-4">
                        <a class="pl-10" href="{{ route('home') }}">Home</a>
                    </div>
                    <div class="hover:bg-gray-300 w-full py-4">
                        <a class="pl-10 hover:bg-gray-300" href="{{ route('admin.praxis.index') }}">Search</a>                      
                    </div>
                    <div class="hover:bg-gray-300 w-full py-4">
                        <a class="pl-10 hover:bg-gray-300" href="{{ route('impressum.index') }}">Impressum</a>                       
                    </div>
                    <div class="hover:bg-gray-300 w-full py-4">
                        <a class="pl-10 hover:bg-gray-300" href="{{ route('agb.index') }}">AGB</a>                        
                    </div>
                </div>
            </button>
            <div class="border-x border-gray-200 h-full px-8 py-4">
                <div class="">
                    <p class="flex items-center flex-shrink-0 h-10 px-2 text-sm font-medium rounded hover:bg-gray-300">
                        Verzeichnis
                    </p>
                    <a href="{{ route('admin.user.index')}}" class="flex items-center flex-shrink-0 h-10 pl-6 pr-2 text-sm font-medium rounded hover:bg-gray-300">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-5" fill="#71717a" viewBox="0 0 512 511.142">   
                            <path fill-rule="nonzero" d="M147.532 262.835c-9.491-15.114-27.284-35.632-27.284-53.334 0-10.001 7.88-23.041 19.17-25.943-.898-14.966-1.485-30.172-1.485-45.209 0-8.905.168-17.894.504-26.715 3.507-39.979 32.149-68.182 68.492-81.43C221.504 24.89 214.44.343 230.431.02c37.366-.968 98.79 33.225 122.753 59.168 15.251 16.864 23.961 38.69 24.469 61.43l-1.52 65.434c6.645 1.621 14.069 6.807 15.712 13.451 5.109 20.652-16.32 46.356-26.28 62.779-9.196 15.164-44.304 64.211-44.337 64.551-.167 1.771.741 4.024 3.155 7.637C378.895 409.396 512 362.119 512 511.142H0c0-149.115 133.15-101.744 187.617-176.67 2.691-3.957 3.92-6.089 3.89-7.826-.016-.93-40.362-58.059-43.975-63.811z"/>
                        </svg>
                        <span class="leading-none ml-2">
                            User
                        </span>
                    </a>

                    <a href="{{ route('admin.praxis.index')}}" class="flex items-center flex-shrink-0 h-10 pl-6 pr-2 text-sm font-medium rounded hover:bg-gray-300">
                        <svg xmlns="http://www.w3.org/2000/svg"  class="h-5 w-5" fill="#71717a" viewBox="0 0 122.88 104.81" fill-rule="evenodd" clip-rule="evenodd">
                            <path d="M11.51,102.9v-44c-2.34,0.9-4.53,0.92-6.35,0.3c-1.42-0.48-2.62-1.34-3.5-2.45c-0.88-1.11-1.44-2.46-1.61-3.95 c-0.26-2.31,0.43-4.92,2.4-7.37l0,0c0.1-0.12,0.21-0.24,0.34-0.34L59.85,0.55c0.74-0.68,1.88-0.75,2.7-0.11l57.19,44.46l0,0 c0.09,0.07,0.17,0.14,0.25,0.23c2.65,2.85,3.31,6.01,2.67,8.68c-0.32,1.32-0.95,2.5-1.82,3.48c-0.87,0.98-1.98,1.74-3.24,2.19 c-2,0.72-4.38,0.7-6.79-0.44v43.74h-5.6v-46.2c0-1.01-39.23-32.02-43.56-35.39c-4.59,3.49-44.54,34.25-44.54,35.55v46.18 L11.51,102.9L11.51,102.9z M63.34,55.69v17.99h16.14v-0.05c0-4.96-2.03-9.47-5.3-12.74C71.33,58.04,67.54,56.13,63.34,55.69 L63.34,55.69z M63.34,77.48v15.62h16.14V77.48H63.34L63.34,77.48z M59.54,93.09V77.48H43.4v15.62H59.54L59.54,93.09z M59.54,73.68 V55.69c-4.21,0.45-7.99,2.35-10.84,5.2c-3.27,3.27-5.3,7.78-5.3,12.74v0.05H59.54L59.54,73.68z M35.59,101.02h51.69v3.8H35.59 V101.02L35.59,101.02z M61.44,51.79c6.01,0,11.47,2.46,15.42,6.41c3.96,3.96,6.41,9.42,6.41,15.42v23.26H39.6V73.62 c0-6.01,2.46-11.47,6.41-15.42C49.97,54.25,55.43,51.79,61.44,51.79L61.44,51.79z M93.76,3.55l17.17,0.7v23.19L93.76,16.11V3.55 L93.76,3.55L93.76,3.55z"/>
                        </svg>
                        <span class="leading-none ml-2">
                            Praxis
                        </span>
                    </a>
                </div>

                <div>
                    <p class="mt-4 flex items-center flex-shrink-0 h-10 px-2 text-sm font-medium rounded hover:bg-gray-300">
                        Create
                    </p>
                    <a href="{{ route('admin.user.create')}}" class="flex items-center flex-shrink-0 h-10 pl-6 pr-2 text-sm font-medium rounded hover:bg-gray-300">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-5" fill="#71717a" viewBox="0 0 512 511.142">
                            <path fill-rule="nonzero" d="M147.532 262.835c-9.491-15.114-27.284-35.632-27.284-53.334 0-10.001 7.88-23.041 19.17-25.943-.898-14.966-1.485-30.172-1.485-45.209 0-8.905.168-17.894.504-26.715 3.507-39.979 32.149-68.182 68.492-81.43C221.504 24.89 214.44.343 230.431.02c37.366-.968 98.79 33.225 122.753 59.168 15.251 16.864 23.961 38.69 24.469 61.43l-1.52 65.434c6.645 1.621 14.069 6.807 15.712 13.451 5.109 20.652-16.32 46.356-26.28 62.779-9.196 15.164-44.304 64.211-44.337 64.551-.167 1.771.741 4.024 3.155 7.637C378.895 409.396 512 362.119 512 511.142H0c0-149.115 133.15-101.744 187.617-176.67 2.691-3.957 3.92-6.089 3.89-7.826-.016-.93-40.362-58.059-43.975-63.811z"/>
                        </svg>
                        <span class="leading-none ml-2">
                            User
                        </span>
                    </a>
                    <a href="{{ route('admin.praxis.create')}}" class="flex items-center flex-shrink-0 h-10 pl-6 pr-2 text-sm font-medium rounded hover:bg-gray-300">
                        <svg xmlns="http://www.w3.org/2000/svg"  class="h-5 w-5" fill="#71717a" viewBox="0 0 122.88 104.81" fill-rule="evenodd" clip-rule="evenodd">
                            <path d="M11.51,102.9v-44c-2.34,0.9-4.53,0.92-6.35,0.3c-1.42-0.48-2.62-1.34-3.5-2.45c-0.88-1.11-1.44-2.46-1.61-3.95 c-0.26-2.31,0.43-4.92,2.4-7.37l0,0c0.1-0.12,0.21-0.24,0.34-0.34L59.85,0.55c0.74-0.68,1.88-0.75,2.7-0.11l57.19,44.46l0,0 c0.09,0.07,0.17,0.14,0.25,0.23c2.65,2.85,3.31,6.01,2.67,8.68c-0.32,1.32-0.95,2.5-1.82,3.48c-0.87,0.98-1.98,1.74-3.24,2.19 c-2,0.72-4.38,0.7-6.79-0.44v43.74h-5.6v-46.2c0-1.01-39.23-32.02-43.56-35.39c-4.59,3.49-44.54,34.25-44.54,35.55v46.18 L11.51,102.9L11.51,102.9z M63.34,55.69v17.99h16.14v-0.05c0-4.96-2.03-9.47-5.3-12.74C71.33,58.04,67.54,56.13,63.34,55.69 L63.34,55.69z M63.34,77.48v15.62h16.14V77.48H63.34L63.34,77.48z M59.54,93.09V77.48H43.4v15.62H59.54L59.54,93.09z M59.54,73.68 V55.69c-4.21,0.45-7.99,2.35-10.84,5.2c-3.27,3.27-5.3,7.78-5.3,12.74v0.05H59.54L59.54,73.68z M35.59,101.02h51.69v3.8H35.59 V101.02L35.59,101.02z M61.44,51.79c6.01,0,11.47,2.46,15.42,6.41c3.96,3.96,6.41,9.42,6.41,15.42v23.26H39.6V73.62 c0-6.01,2.46-11.47,6.41-15.42C49.97,54.25,55.43,51.79,61.44,51.79L61.44,51.79z M93.76,3.55l17.17,0.7v23.19L93.76,16.11V3.55 L93.76,3.55L93.76,3.55z"/>
                        </svg>
                        <span class="leading-none ml-2">
                            Praxis
                        </span>
                    </a>
                </div>
            </div>
        </menu>
        <div class="flex flex-col flex-grow">
            <header class="bg-slate-500 top-0 fixed flex justify-between items-center w-[85vw] h-16 px-4 shadow-b">
                <div>
                   
                </div>
                <div class="flex items-center flex-shrink-0 h-16 px-4">
                    @include('components.icone_admin')  
                </div>
            </header>
            <div class="mt-16 h-full">
                @yield('content')
            </div>
        </div>        
    </div>
</body>
</html>

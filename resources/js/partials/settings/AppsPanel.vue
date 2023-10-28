<template>
  <div class="grow">

    <!-- Panel body -->
    <div class="p-6">
      <h2 class="text-2xl text-slate-800 font-bold mb-5">Connected Apps</h2>

      <!-- General -->
      <div class="mb-6 hidden">
        <!-- Filters -->
        <div class="mb-4 border-b border-slate-200">
          <ul class="text-sm font-medium flex flex-nowrap -mx-4 sm:-mx-6 lg:-mx-8 overflow-x-scroll no-scrollbar">
            <li class="pb-3 mr-6 last:mr-0 first:pl-4 sm:first:pl-6 lg:first:pl-8 last:pr-4 sm:last:pr-6 lg:last:pr-8">
              <a class="text-indigo-500 whitespace-nowrap" href="#0">View All</a>
            </li>
            <li class="pb-3 mr-6 last:mr-0 first:pl-4 sm:first:pl-6 lg:first:pl-8 last:pr-4 sm:last:pr-6 lg:last:pr-8">
              <a class="text-slate-500 hover:text-slate-600 whitespace-nowrap" href="#0">Utility</a>
            </li>
            <li class="pb-3 mr-6 last:mr-0 first:pl-4 sm:first:pl-6 lg:first:pl-8 last:pr-4 sm:last:pr-6 lg:last:pr-8">
              <a class="text-slate-500 hover:text-slate-600 whitespace-nowrap" href="#0">Marketing</a>
            </li>
            <li class="pb-3 mr-6 last:mr-0 first:pl-4 sm:first:pl-6 lg:first:pl-8 last:pr-4 sm:last:pr-6 lg:last:pr-8">
              <a class="text-slate-500 hover:text-slate-600 whitespace-nowrap" href="#0">Development</a>
            </li>
          </ul>
        </div>
      </div>

      <!-- Connected Apps cards -->
      <section class="pb-6 border-b border-slate-200">
        <div class="grid grid-cols-12 gap-6">
          <!-- Card 1 -->
          <div class="col-span-full xl:col-span-6 2xl:col-span-4 bg-white shadow-md rounded-sm border border-slate-200">
            <!-- Card content -->
            <div class="flex flex-col h-full p-5">
              <div class="grow">
                <header class="flex items-center mb-4">
                  <div class="w-10 h-10 rounded-full shrink-0 bg-gradient-to-tr from-indigo-500 to-indigo-300 mr-3">
                      <img src="/images/SenderioIcon.png"  alt="SenderioIcon">
                  </div>
                  <h3 class="text-lg text-slate-800 font-semibold">Connect to Sendero</h3>
                </header>
                <div class="text-sm">Track and send all Members and Posts to Sendero..</div>
              </div>
              <!-- Card footer -->
              <footer class="mt-4">
                <div class="flex flex-wrap justify-between items-center">
                  <!-- Left side -->
                  <div class="flex space-x-3">
                    <div class="flex items-center text-slate-400">
                      <svg class="w-4 h-4 shrink-0 fill-current mr-1.5" viewBox="0 0 16 16">
                        <path d="M14.14 9.585a2.5 2.5 0 00-3.522 3.194c-.845.63-1.87.97-2.924.971a4.979 4.979 0 01-1.113-.135 4.436 4.436 0 01-1.343 1.682 6.91 6.91 0 006.9-1.165 2.5 2.5 0 002-4.547h.002zM10.125 2.188a2.5 2.5 0 10-.4 2.014 5.027 5.027 0 012.723 3.078c.148-.018.297-.028.446-.03a4.5 4.5 0 011.7.334 7.023 7.023 0 00-4.469-5.396zM4.663 10.5a2.49 2.49 0 00-1.932-1.234 4.624 4.624 0 01-.037-.516 4.97 4.97 0 011.348-3.391 4.456 4.456 0 01-.788-2.016A6.989 6.989 0 00.694 8.75c.004.391.04.781.11 1.166a2.5 2.5 0 103.86.584z" />
                      </svg>
                      <div class="text-sm text-slate-500">4K+</div>
                    </div>
                    <div class="flex items-center text-amber-500">
                      <svg class="w-4 h-4 shrink-0 fill-current mr-1.5" viewBox="0 0 16 16">
                        <path d="M10 5.934L8 0 6 5.934H0l4.89 3.954L2.968 16 8 12.223 13.032 16 11.11 9.888 16 5.934z" />
                      </svg>
                      <div class="text-sm text-amber-600">4.7</div>
                    </div>
                  </div>
                  <!-- Right side -->
                  <button class="btn-sm border-slate-200 hover:border-slate-300 shadow-sm flex items-center">
                    <svg class="w-3 h-3 shrink-0 fill-current text-emerald-500 mr-2" viewBox="0 0 12 12">
                      <path d="M10.28 1.28L3.989 7.575 1.695 5.28A1 1 0 00.28 6.695l3 3a1 1 0 001.414 0l7-7A1 1 0 0010.28 1.28z" />
                    </svg>
                    <span>Connected</span>
                  </button>
                </div>
              </footer>
            </div>
          </div>
          <!-- Card 2 -->
          <div class="col-span-full xl:col-span-6 2xl:col-span-4 bg-white shadow-md rounded-sm border border-slate-200">
            <!-- Card content -->
            <div class="flex flex-col h-full p-5">
              <div class="grow">
                <header class="flex items-center mb-4">
                    <img src="/images/FoundryAnalytics.png"  alt="SenderioIcon">
                  <h3 class="text-lg text-slate-800 font-semibold">Foundry Analytics</h3>
                </header>
                <div class="text-sm">Get analytics and insights on your members with email flows as a power up..</div>
              </div>
              <!-- Card footer -->
              <footer class="mt-4">
                <div class="flex flex-wrap justify-between items-center">
                  <!-- Left side -->
                  <div class="flex space-x-3">
                    <div class="flex items-center text-slate-400">
                      <svg class="w-4 h-4 shrink-0 fill-current mr-1.5" viewBox="0 0 16 16">
                        <path d="M14.14 9.585a2.5 2.5 0 00-3.522 3.194c-.845.63-1.87.97-2.924.971a4.979 4.979 0 01-1.113-.135 4.436 4.436 0 01-1.343 1.682 6.91 6.91 0 006.9-1.165 2.5 2.5 0 002-4.547h.002zM10.125 2.188a2.5 2.5 0 10-.4 2.014 5.027 5.027 0 012.723 3.078c.148-.018.297-.028.446-.03a4.5 4.5 0 011.7.334 7.023 7.023 0 00-4.469-5.396zM4.663 10.5a2.49 2.49 0 00-1.932-1.234 4.624 4.624 0 01-.037-.516 4.97 4.97 0 011.348-3.391 4.456 4.456 0 01-.788-2.016A6.989 6.989 0 00.694 8.75c.004.391.04.781.11 1.166a2.5 2.5 0 103.86.584z" />
                      </svg>
                      <div class="text-sm text-slate-500">4K+</div>
                    </div>
                    <div class="flex items-center text-amber-500">
                      <svg class="w-4 h-4 shrink-0 fill-current mr-1.5" viewBox="0 0 16 16">
                        <path d="M10 5.934L8 0 6 5.934H0l4.89 3.954L2.968 16 8 12.223 13.032 16 11.11 9.888 16 5.934z" />
                      </svg>
                      <div class="text-sm text-amber-600">4.7</div>
                    </div>
                  </div>
                  <!-- Right side -->
                  <button class="btn-sm border-slate-200 hover:border-slate-300 shadow-sm flex items-center">
                    <svg class="w-3 h-3 shrink-0 fill-current text-emerald-500 mr-2" viewBox="0 0 12 12">
                      <path d="M10.28 1.28L3.989 7.575 1.695 5.28A1 1 0 00.28 6.695l3 3a1 1 0 001.414 0l7-7A1 1 0 0010.28 1.28z" />
                    </svg>
                    <span>Connected</span>
                  </button>
                </div>
              </footer>
            </div>
          </div>
          <!-- Card 3 -->
          <div class="col-span-full xl:col-span-6 2xl:col-span-4 bg-white shadow-md rounded-sm border border-slate-200">
            <!-- Card content -->
            <div class="flex flex-col h-full p-5">
              <div class="grow">
                <header class="flex items-center mb-4">
                  <div class="w-10 h-10 rounded-full shrink-0 bg-gradient-to-tr from-sky-500 to-sky-300 mr-3">
                      <img src="/images/HexigonExtented.png"  alt="SenderioIcon">
                  </div>
                  <h3 class="text-lg text-slate-800 font-semibold">HexigonExtend</h3>
                </header>
                <div class="text-sm">Connect & Embed your community with our Hexigon Chrome Extension.</div>
              </div>
              <!-- Card footer -->
              <footer class="mt-4">
                <div class="flex flex-wrap justify-between items-center">
                  <!-- Left side -->
                  <div class="flex space-x-3">
                    <div class="flex items-center text-slate-400">
                      <svg class="w-4 h-4 shrink-0 fill-current mr-1.5" viewBox="0 0 16 16">
                        <path d="M14.14 9.585a2.5 2.5 0 00-3.522 3.194c-.845.63-1.87.97-2.924.971a4.979 4.979 0 01-1.113-.135 4.436 4.436 0 01-1.343 1.682 6.91 6.91 0 006.9-1.165 2.5 2.5 0 002-4.547h.002zM10.125 2.188a2.5 2.5 0 10-.4 2.014 5.027 5.027 0 012.723 3.078c.148-.018.297-.028.446-.03a4.5 4.5 0 011.7.334 7.023 7.023 0 00-4.469-5.396zM4.663 10.5a2.49 2.49 0 00-1.932-1.234 4.624 4.624 0 01-.037-.516 4.97 4.97 0 011.348-3.391 4.456 4.456 0 01-.788-2.016A6.989 6.989 0 00.694 8.75c.004.391.04.781.11 1.166a2.5 2.5 0 103.86.584z" />
                      </svg>
                      <div class="text-sm text-slate-500">4K+</div>
                    </div>
                    <div class="flex items-center text-amber-500">
                      <svg class="w-4 h-4 shrink-0 fill-current mr-1.5" viewBox="0 0 16 16">
                        <path d="M10 5.934L8 0 6 5.934H0l4.89 3.954L2.968 16 8 12.223 13.032 16 11.11 9.888 16 5.934z" />
                      </svg>
                      <div class="text-sm text-amber-600">4.7</div>
                    </div>
                  </div>
                  <!-- Right side -->
                  <button class="btn-sm border-slate-200 hover:border-slate-300 shadow-sm flex items-center">
                    <svg class="w-3 h-3 shrink-0 fill-current text-emerald-500 mr-2" viewBox="0 0 12 12">
                      <path d="M10.28 1.28L3.989 7.575 1.695 5.28A1 1 0 00.28 6.695l3 3a1 1 0 001.414 0l7-7A1 1 0 0010.28 1.28z" />
                    </svg>
                    <span>Connected</span>
                  </button>
                </div>
              </footer>
            </div>
          </div>
          <!-- Card 4 -->
          <div class="col-span-full xl:col-span-6 2xl:col-span-4 bg-white shadow-md rounded-sm border border-slate-200">
            <!-- Card content -->
            <div class="flex flex-col h-full p-5">
              <div class="grow">
                <header class="flex items-center mb-4">
                  <div class="w-10 h-10 rounded-full shrink-0 bg-gradient-to-tr from-amber-500 to-amber-300 mr-3">
                      <img src="/images/Duplixs.png"  alt="SenderioIcon">
                  </div>
                  <h3 class="text-lg text-slate-800 font-semibold">Duplixs Embed</h3>
                </header>
                <div class="text-sm">Embed your chat or community to your Duplixs customer support AI.</div>
              </div>
              <!-- Card footer -->
              <footer class="mt-4">
                <div class="flex flex-wrap justify-between items-center">
                  <!-- Left side -->
                  <div class="flex space-x-3">
                    <div class="flex items-center text-slate-400">
                      <svg class="w-4 h-4 shrink-0 fill-current mr-1.5" viewBox="0 0 16 16">
                        <path d="M14.14 9.585a2.5 2.5 0 00-3.522 3.194c-.845.63-1.87.97-2.924.971a4.979 4.979 0 01-1.113-.135 4.436 4.436 0 01-1.343 1.682 6.91 6.91 0 006.9-1.165 2.5 2.5 0 002-4.547h.002zM10.125 2.188a2.5 2.5 0 10-.4 2.014 5.027 5.027 0 012.723 3.078c.148-.018.297-.028.446-.03a4.5 4.5 0 011.7.334 7.023 7.023 0 00-4.469-5.396zM4.663 10.5a2.49 2.49 0 00-1.932-1.234 4.624 4.624 0 01-.037-.516 4.97 4.97 0 011.348-3.391 4.456 4.456 0 01-.788-2.016A6.989 6.989 0 00.694 8.75c.004.391.04.781.11 1.166a2.5 2.5 0 103.86.584z" />
                      </svg>
                      <div class="text-sm text-slate-500">4K+</div>
                    </div>
                    <div class="flex items-center text-amber-500">
                      <svg class="w-4 h-4 shrink-0 fill-current mr-1.5" viewBox="0 0 16 16">
                        <path d="M10 5.934L8 0 6 5.934H0l4.89 3.954L2.968 16 8 12.223 13.032 16 11.11 9.888 16 5.934z" />
                      </svg>
                      <div class="text-sm text-amber-600">4.7</div>
                    </div>
                  </div>
                  <!-- Right side -->
                  <button class="btn-sm border-slate-200 hover:border-slate-300 shadow-sm flex items-center">
                    <svg class="w-3 h-3 shrink-0 fill-current text-emerald-500 mr-2" viewBox="0 0 12 12">
                      <path d="M10.28 1.28L3.989 7.575 1.695 5.28A1 1 0 00.28 6.695l3 3a1 1 0 001.414 0l7-7A1 1 0 0010.28 1.28z" />
                    </svg>
                    <span>Connected</span>
                  </button>
                </div>
              </footer>
            </div>
          </div>
        </div>
      </section>

      <!-- Trending Categories cards -->
      <section>
        <h3 class="text-xl leading-snug text-slate-800 font-bold mt-6 mb-5">Downloads</h3>
        <div class="grid grid-cols-12 gap-6">
          <!-- Card 1 -->
          <div class="col-span-full xl:col-span-4 bg-white shadow-md rounded-sm border border-slate-200">
            <!-- Card content -->
            <div class="flex flex-col h-full p-5">
              <div class="grow">
                <header class="flex justify-between">
                  <h3 class="text-lg text-slate-800 font-semibold mb-1">Foundry For Windows</h3>
                    <svg width="27" height="27" viewBox="0 0 27 27" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M10.1906 2.41714L0.547714 3.86361C0.232714 3.91118 0 4.18119 0 4.49941V12.2139C0 12.5694 0.288 12.8568 0.642857 12.8568H10.2857C10.6406 12.8568 10.9286 12.5694 10.9286 12.2139V3.05295C10.9286 2.86587 10.8469 2.68844 10.7049 2.56565C10.5634 2.44414 10.3751 2.39143 10.1906 2.41714ZM26.7763 0.15487C26.6349 0.0333672 26.4471 -0.0193485 26.2614 0.00636649L12.7614 2.03142C12.447 2.07899 12.2143 2.349 12.2143 2.66722V12.2139C12.2143 12.5694 12.5023 12.8568 12.8571 12.8568H26.3571C26.712 12.8568 27 12.5694 27 12.2139V0.642169C27 0.455092 26.9184 0.277659 26.7763 0.15487ZM10.2857 14.1425H0.642857C0.288 14.1425 0 14.4299 0 14.7854V22.4999C0 22.8181 0.232714 23.0881 0.547714 23.1357L10.1906 24.5821C10.2227 24.5866 10.2542 24.5892 10.2857 24.5892C10.4387 24.5892 10.5879 24.5346 10.7049 24.4336C10.8469 24.3109 10.9286 24.1334 10.9286 23.9463V14.7854C10.9286 14.4299 10.6406 14.1425 10.2857 14.1425ZM26.3571 14.1425H12.8571C12.5023 14.1425 12.2143 14.4299 12.2143 14.7854V24.3321C12.2143 24.6503 12.447 24.9203 12.762 24.9679L26.262 26.9929C26.2935 26.9974 26.3256 27 26.3571 27C26.5101 27 26.6593 26.9454 26.7763 26.8444C26.9184 26.7216 27 26.5442 27 26.3571V14.7854C27 14.4299 26.712 14.1425 26.3571 14.1425Z" fill="black"/>
                    </svg>

                </header>
              </div>
              <!-- Card footer -->
              <footer class="mt-2">
                <div class="flex flex-wrap justify-between items-center">
                  <!-- Left side -->
                  <div class="text-sm text-slate-500 italic">500+ Downloads</div>
                  <!-- Right side -->
                  <a class="text-sm font-medium text-indigo-500 hover:text-indigo-600" href="#0">Explore -&gt;</a>
                </div>
              </footer>
            </div>
          </div>
          <!-- Card 2 -->
          <div class="col-span-full xl:col-span-4 bg-white shadow-md rounded-sm border border-slate-200">
            <!-- Card content -->
            <div class="flex flex-col h-full p-5">
              <div class="grow">
                <header class="flex justify-between">
                  <h3 class="text-lg text-slate-800 font-semibold mb-1">Foundry For Mac</h3>
                    <svg width="30" height="30" viewBox="0 0 30 30" fill="none" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                        <rect width="30" height="30" fill="url(#pattern0)"/>
                        <defs>
                            <pattern id="pattern0" patternContentUnits="objectBoundingBox" width="1" height="1">
                                <use xlink:href="#image0_328_10270" transform="scale(0.0111111)"/>
                            </pattern>
                            <image id="image0_328_10270" width="90" height="90" xlink:href="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAFoAAABaCAYAAAA4qEECAAAABmJLR0QA/wD/AP+gvaeTAAAE+UlEQVR4nO2dXYhWRRjHf7ula1tmC7W5XchW5lbglrBGkjemEIVddGGxiQZFFAUaXokUgRHSRdAHoYgIUt4kfUCZKSJZkbJ6UVrRomEfVPjVqm1par5dPPvSurm7Z+bMc5454/nBH2/2nfmfv3PmPfNx5oWKQmiwNlAADUAXMHfg38lAD7DA0lRKXAY8DewDakP0gaGvpOgGfuL/Adf1lp21NGgBNjB8wHW9ZGUwBW4AvmX0kGvAfCOPpedG4BeyhVxDvhArHJkAfE/2kL+zsVl+3iR7yDXgeRub5aYbt5D/Bq4zcVpixgO/4Rb0ayZOS85y3EI+ArSaOC0xzUhwLkF3mzgtOfOpuoxCeI/sIW8BLrWxWX4Oki3k3chzdoUH15It5E+oQs7FLYwc8FlgBVV3kZtbGT7kbcA0O2tpMYH/gj2DzNi9TBWwCi3IUHqMtZGsFLlm2ARMB2Yira8NuAZoBE4gS067gc3AN4HqHA/MAm4Dpg7UedWAl8PIoOdHZA1xO/BzoHpNmA6sBPpwm8pcCkz0qK8DWAJsRSaRstZ5DtgBPIWsN5aGTmAjbiO4oToNvA3czch3303Ac8DXOeur6yDynxX1k0sT8uX0D2Euuq5e4EXgHqQruBd4AeluQtYzWLuQLic6pgBfoXfhFvoL2RMSDV3AIeyD0dAZYGG4qPyZAfyBfSCaOgvMCRWYD9eTfZKn7DoKtPuE1OjzoUE0Ax9x8axcXIGMAwrnFexbWVHqxegJ5C7CP8LFqm3IsN+ELzIYTEGfI12GCfdlMJiC9iDzJWZsvoCp1NSPLDKY0YZMwFgHoa3HQgXmy+PYh6CtveR/9D0Pn8KiGvcr8Sxy15rRhPRd1i1OuzUHXxBxbdEdwOWhTURGfRtwUFyDNv0WLoiNGoX6tOiUOYqsqgfHNegpGiYiov6yUXBcg75Sw0REHNAq2DXoZhUX8XBCq2DXoMepuIgHtWdn16DHqriIh6u1CnYNul/FRTy0aRXsGrRaHxYJt6O0Tc416GMaJiKiBXndOTiuQR/RMBEZKpNmrkHv0zARGQ9qFOoa9H4NE5ExA7gjdKFVi74wy6wNNCATL9ZzxkVodqDMAPcWXQN2hjQQMWsIOLfjs5R1sQTdDryL4Wh4Nva3dZFai9H5gONIf4vuUK3E6DULl5feU9EWDPbfPRrAeBn1K/BAgPwy04q8MWV94VbahAxsMnOJyx8P4k/k/cHUF2uHYzLyXkvmFfM8257W5fhsChR2/WOR13ytb2MLOR9SmKdFnwZW5fh8mSn8bm4FTmLfwopUPx5ri3m3ph4C1ucso2yswmgBpB04hX1LK0Kn8DxyM8Rm6x+A1QHKKQNrkEGLGa3ICrl1i9NUH4r7PlxYjH0YmloULqp8NJLuu4c78B9Fq9BJel+MJ4GbQ4YUitS6kMVh4wlHA/A+9gGF0FYi//WlFuSYM+ug8qgPmBQ6GA1m4nYcWkw6h9KOJS0ewT40H63QCEObZdgH56INKDzKFfFs+BlyK84KUNZh5Jy7Xcgzey/yi0JjkKMw8/Ih8BByUFVpeRg5Q861hfUAzyC/hTUSE4EngE896qgBrxL5yY0udAAfM/pF9yMTOF2e9XQCbyAb50eraz9wv2c90XMn8DrwJfA70tIPIPtFniTckfHNyBfyeqSbOY6M9HqBd4B5yEECFRUVFRUVFRWJ8C+sdW9SKeoYtQAAAABJRU5ErkJggg=="/>
                        </defs>
                    </svg>

                </header>
              </div>
              <!-- Card footer -->
              <footer class="mt-2">
                <div class="flex flex-wrap justify-between items-center">
                  <!-- Left side -->
                  <div class="text-sm text-slate-500 italic">320+ Downloads</div>
                  <!-- Right side -->
                  <a class="text-sm font-medium text-indigo-500 hover:text-indigo-600" href="#0">Explore -&gt;</a>
                </div>
              </footer>
            </div>
          </div>
          <!-- Card 3 -->
          <div class="col-span-full xl:col-span-4 bg-white shadow-md rounded-sm border border-slate-200">
            <!-- Card content -->
            <div class="flex flex-col h-full p-5">
              <div class="grow">
                <header class="flex justify-between">
                  <h3 class="text-lg text-slate-800 font-semibold mb-1">Foundry For iOS</h3>
                    <svg width="30" height="30" viewBox="0 0 30 30" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M8.18182 0C3.66818 0 0 3.66818 0 8.18182V21.8182C0 26.3318 3.66818 30 8.18182 30H21.8182C26.3318 30 30 26.3318 30 21.8182V8.18182C30 3.66818 26.3318 0 21.8182 0H8.18182ZM5.87669 10.2752C6.35396 10.2752 6.70898 10.6162 6.70898 11.0662C6.70898 11.5094 6.35396 11.8506 5.87669 11.8506C5.3926 11.8506 5.03906 11.5094 5.03906 11.0662C5.03906 10.6162 5.3926 10.2752 5.87669 10.2752ZM12.9812 10.6641C15.4698 10.6641 17.0042 12.4018 17.0042 15.1904C17.0042 17.9722 15.4835 19.7248 12.9812 19.7248C10.4653 19.7248 8.93821 17.9791 8.93821 15.1904C8.93821 12.395 10.4994 10.6641 12.9812 10.6641ZM21.7982 10.6641C23.5505 10.6641 24.8312 11.6859 24.913 13.145H23.604C23.4744 12.3472 22.786 11.8506 21.7769 11.8506C20.7133 11.8506 20.0111 12.3542 20.0111 13.1383C20.0111 13.752 20.4613 14.1069 21.5931 14.3728L22.5413 14.6045C24.3208 15.0204 25.0502 15.7365 25.0502 17.0388C25.0502 18.6956 23.7679 19.7314 21.7156 19.7314C19.7997 19.7314 18.5112 18.7437 18.4157 17.1959H19.7461C19.862 18.0141 20.6659 18.5383 21.8182 18.5383C22.8955 18.5383 23.6865 17.9797 23.6865 17.2093C23.6865 16.5547 23.1887 16.1596 22.0432 15.8869L20.9246 15.6206C19.3633 15.2524 18.6475 14.4957 18.6475 13.2275C18.6475 11.6866 19.9096 10.6641 21.7982 10.6641ZM12.9812 11.9118C11.3516 11.9118 10.3165 13.1859 10.3165 15.1904C10.3165 17.1882 11.3175 18.477 12.9812 18.477C14.6244 18.477 15.6339 17.1882 15.6339 15.1904C15.6339 13.1859 14.6244 11.9118 12.9812 11.9118ZM5.23615 12.9958H6.51855V19.521H5.23615V12.9958Z" fill="black"/>
                    </svg>

                </header>
              </div>
              <!-- Card footer -->
              <footer class="mt-2">
                <div class="flex flex-wrap justify-between items-center">
                  <!-- Left side -->
                  <div class="text-sm text-slate-500 italic">400+ Downloads</div>
                  <!-- Right side -->
                  <a class="text-sm font-medium text-indigo-500 hover:text-indigo-600" href="#0">Explore -&gt;</a>
                </div>
              </footer>
            </div>
          </div>
        </div>
      </section>
    </div>

  </div>
</template>

<script>
export default {
  name: 'AppsPanel',
}
</script>

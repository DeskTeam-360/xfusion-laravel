<div id="hs-overlay-right"
     class="customizer  rounded-none hs-overlay bg-white dark:bg-dark hs-overlay-open:translate-x-0  translate-x-full rtl:hs-overlay-open:translate-x-0  rtl:-translate-x-full  fixed top-0 right-0 rtl:left-0 rtl:right-auto transition-all duration-300 transform h-full max-w-xs  w-full z-[60] hidden "
     tabindex="-1">
    <div class="flex justify-between items-center  border-border dark:border-darkborder  border-b py-3 px-6 ">
        <h3 class="font-semibold text-lg text-dark dark:text-white">
            Settings
        </h3>
        <button type="button"
                class="inline-flex flex-shrink-0 justify-center items-center h-8 w-8 rounded-md text-gray-500 hover:text-gray-700 focus:outline-none focus:ring-2 focus:ring-gray-400 focus:ring-offset-2 focus:ring-offset-white text-sm "
                data-hs-overlay="#hs-overlay-right">
            <span class="sr-only">Close modal</span>
            <i class="ti ti-x text-xl text-dark dark:text-white"></i>
        </button>
    </div>

    <!-------Light/Dark Theme--------->
    <div class="px-6 py-6" data-simplebar="" style="height: calc(100vh - 80px)">
        <h6 class="font-semibold text-dark dark:text-white mb-2">Theme</h6>
        <div class="flex flex-row gap-3 customizer-box mb-8" role="group">
            <input type="radio" class=" btn-check" name="theme-layout" autocomplete="off"/>
            <label
                class="btn btn-outline border border-border dark:border-darkborder text-primary h-full py-3 px-5 hs-dark-mode-active:text-darklink cursor-pointer"
                for="light-layout" data-hs-theme-click-value="light"><i
                    class="icon ti ti-sun text-2xl me-2 "></i> Light</label>
            <input type="radio" class="btn-check" name="theme-layout" autocomplete="off"/>
            <label
                class="btn btn-outline border border-border dark:border-darkborder text-link  h-full py-3 px-5 cursor-pointer hs-dark-mode-active:text-primary"
                for="dark-layout" data-hs-theme-click-value="dark"><i
                    class="icon ti ti-moon text-2xl me-2 "></i> Dark</label>
        </div>

        <!-------Theme Direction--------->
        <h6 class="font-semibold mb-2 text-dark dark:text-white">Theme Direction</h6>
        <div class="flex flex-row gap-3 customizer-box mb-8" role="group">
            <input type="radio" class="btn-check" name="direction-l" id="ltr-layout" autocomplete="off"/>
            <label
                class="btn btn-outline border border-border dark:border-darkborder text-link dark:text-darklink h-full py-3 px-5 cursor-pointer"
                for="ltr-layout"><i
                    class="icon ti ti-text-direction-ltr text-2xl me-2"></i>LTR</label>
            <input type="radio" class="btn-check" name="direction-l" id="rtl-layout" autocomplete="off"/>
            <label
                class="btn btn-outline border border-border dark:border-darkborder text-link dark:text-darklink h-full py-3 px-5 cursor-pointer"
                for="rtl-layout">
                <i class="icon ti ti-text-direction-rtl text-2xl me-2"></i>RTL</label>
        </div>

        <!-------Theme Colors--------->
        <h6 class="font-semibold mb-2 text-dark dark:text-white">Theme Colors</h6>
        <div class="flex flex-row flex-wrap gap-3 customizer-box color-pallete mb-8" role="group">
            <input type="radio" class="btn-check" name="color-theme-layout" id="Blue_Theme" autocomplete="off"/>
            <label
                class="hs-tooltip btn py-4 px-5 btn-outline border border-border dark:border-darkborder flex items-center  justify-center hs-tooltip-toggle cursor-pointer"
                onclick="handleColorTheme('Blue_Theme')" for="Blue_Theme" data-bs-title="BLUE_THEME">
                <div class="color-box rounded-full flex items-center justify-center skin-1">
                    <i class="ti ti-check  flex icon text-white fs-5"></i>
                </div>
                <span
                    class="rounded-md hs-tooltip-content hs-tooltip-shown:opacity-100 hs-tooltip-shown:visible opacity-0  absolute invisible z-10 text-fs_12 py-1 px-2 bg-dark dark:bg-darkgray  text-white dark:text-gray-300"
                    role="tooltip">
          Blue_Theme
        </span>
            </label>

            <input type="radio" class="btn-check" name="color-theme-layout" id="Aqua_Theme" autocomplete="off"/>
            <label
                class="hs-tooltip hs-tooltip-toggle btn py-4 px-5 btn-outline border border-border dark:border-darkborder flex items-center  justify-center cursor-pointer"
                onclick="handleColorTheme('Aqua_Theme')" for="Aqua_Theme" data-bs-title="AQUA_THEME">
                <div class="color-box rounded-full flex items-center justify-center skin-2">
                    <i class="ti ti-check text-white flex icon fs-5"></i>
                </div>
                <span
                    class="rounded-md hs-tooltip-content hs-tooltip-shown:opacity-100 hs-tooltip-shown:visible opacity-0  absolute invisible z-10 text-fs_12 py-1 px-2 bg-dark dark:bg-darkgray  text-white dark:text-gray-300"
                    role="tooltip">
        Aqua_Theme
      </span>
            </label>

            <input type="radio" class="btn-check" name="color-theme-layout" id="Purple_Theme" autocomplete="off"/>
            <label
                class="hs-tooltip hs-tooltip-toggle btn py-4 px-5 btn-outline border border-border dark:border-darkborder flex items-center  justify-center cursor-pointer"
                onclick="handleColorTheme('Purple_Theme')" for="Purple_Theme"
                data-bs-title="PURPLE_THEME">
                <div class="color-box rounded-full flex items-center justify-center skin-3">
                    <i class="ti ti-check text-white flex icon fs-5"></i>
                </div>
                <span
                    class="rounded-md hs-tooltip-content hs-tooltip-shown:opacity-100 hs-tooltip-shown:visible opacity-0  absolute invisible z-10 text-fs_12 py-1 px-2 bg-dark dark:bg-darkgray  text-white dark:text-gray-300"
                    role="tooltip">
        Purple_Theme
      </span>
            </label>

            <input type="radio" class="btn-check" name="color-theme-layout" id="Green_Theme" autocomplete="off"/>
            <label
                class="hs-tooltip hs-tooltip-toggle btn py-4 px-5 btn-outline border border-border dark:border-darkborder flex items-center  justify-center cursor-pointer"
                onclick="handleColorTheme('Green_Theme')" for="Green_Theme"
                data-bs-title="GREEN_THEME">
                <div class="color-box rounded-full flex items-center justify-center skin-4">
                    <i class="ti ti-check text-white flex icon fs-5"></i>
                </div>
                <span
                    class="rounded-md hs-tooltip-content hs-tooltip-shown:opacity-100 hs-tooltip-shown:visible opacity-0  absolute invisible z-10 text-fs_12 py-1 px-2 bg-dark dark:bg-darkgray  text-white dark:text-gray-300"
                    role="tooltip">
        Green_Theme
      </span>
            </label>

            <input type="radio" class="btn-check" name="color-theme-layout" id="Cyan_Theme" autocomplete="off"/>
            <label
                class="hs-tooltip hs-tooltip-toggle btn py-4 px-5 btn-outline border border-border dark:border-darkborder flex items-center  justify-center cursor-pointer"
                onclick="handleColorTheme('Cyan_Theme')" for="Cyan_Theme"
                data-bs-title="CYAN_THEME">
                <div class="color-box rounded-full flex items-center justify-center skin-5">
                    <i class="ti ti-check text-white flex icon fs-5"></i>
                </div>
                <span
                    class="rounded-md hs-tooltip-content hs-tooltip-shown:opacity-100 hs-tooltip-shown:visible opacity-0  absolute invisible z-10 text-fs_12 py-1 px-2 bg-dark dark:bg-darkgray  text-white dark:text-gray-300"
                    role="tooltip">
        Cyan_Theme
      </span>
            </label>

            <input type="radio" class="btn-check" name="color-theme-layout" id="Orange_Theme"
                   autocomplete="off"/>
            <label
                class="hs-tooltip hs-tooltip-toggle btn py-4 px-5 btn-outline border border-border dark:border-darkborder flex items-center  justify-center cursor-pointer"
                onclick="handleColorTheme('Orange_Theme')" for="Orange_Theme"
                data-bs-title="ORANGE_THEME">
                <div class="color-box rounded-full flex items-center justify-center skin-6">
                    <i class="ti ti-check text-white flex icon fs-5"></i>
                </div>
                <span
                    class="rounded-md hs-tooltip-content hs-tooltip-shown:opacity-100 hs-tooltip-shown:visible opacity-0  absolute invisible z-10 text-fs_12 py-1 px-2 bg-dark dark:bg-darkgray  text-white dark:text-gray-300"
                    role="tooltip">
        Orange_Theme
      </span>
            </label>
        </div>

        <!-- Layput Options  -->
        <h6 class="font-semibold mb-2 text-dark dark:text-white">Layout Type</h6>
        <div class="flex flex-row gap-3 customizer-box mb-8" role="group">
            <div>
                <input type="radio" class="btn-check" name="page-layout" id="vertical-layout" autocomplete="off"/>
                <label
                    class="btn btn-outline border border-border dark:border-darkborder text-link dark:text-darklink h-full py-3 px-5 cursor-pointer"
                    for="vertical-layout">
                    <i class="icon ti ti-layout-sidebar-right text-2xl me-2"></i> Vertical</label>
            </div>
            <div>
                <input type="radio" class="btn-check" name="page-layout" id="horizontal-layout" autocomplete="off"/>
                <label
                    class="btn btn-outline border border-border dark:border-darkborder text-link dark:text-darklink h-full py-3 px-5 cursor-pointer"
                    for="horizontal-layout">
                    <i class=" icon ti ti-layout-navbar text-2xl me-2"></i> Horizontal</label>
            </div>
        </div>

        <!-- Container Options  -->
        <h6 class="font-semibold mb-2 text-dark dark:text-white">Container Option</h6>
        <div class="flex flex-row gap-3 customizer-box mb-8" role="group">
            <input type="radio" class="btn-check" name="layout" id="boxed-layout" autocomplete="off"/>
            <label
                class="btn btn-outline border border-border dark:border-darkborder text-link dark:text-darklink h-full py-3 px-5 cursor-pointer"
                for="boxed-layout">
                <i class="icon ti ti-layout-distribute-vertical text-2xl me-2"></i>
                Boxed</label>

            <input type="radio" class="btn-check" name="layout" id="full-layout" autocomplete="off"/>
            <label
                class="btn btn-outline border border-border dark:border-darkborder text-link dark:text-darklink h-full py-3 px-5 cursor-pointer"
                for="full-layout">
                <i class="icon ti ti-layout-distribute-horizontal text-2xl me-2"></i> Full</label>
        </div>

        <!-- Sidebar Type Options  -->
        <h6 class="font-semibold mb-2 text-dark dark:text-white">Sidebar Type</h6>
        <div class="flex flex-row gap-3 customizer-box mb-8" role="group">
            <a href="javascript:void(0)" class="fullsidebar">
                <input type="radio" class="btn-check" name="sidebar-type" id="full-sidebar" autocomplete="off"/>
                <label
                    class="btn btn-outline border border-border dark:border-darkborder text-link dark:text-darklink h-full py-3 px-5 cursor-pointer"
                    for="full-sidebar"><i
                        class="icon ti ti-layout-sidebar-right text-2xl me-2"></i> Full</label>
            </a>
            <div>
                <input type="radio" class="btn-check " name="sidebar-type" id="mini-sidebar" autocomplete="off"/>
                <label
                    class="btn btn-outline border border-border dark:border-darkborder text-link dark:text-darklink h-full py-3 px-5 cursor-pointer"
                    for="mini-sidebar">
                    <iconify-icon icon="solar:siderbar-outline" class="icon fs-7 me-2"></iconify-icon>
                    Collapse</label>
            </div>
        </div>

        <!-- Border-sahdow Card Options  -->
        <h6 class="font-semibold mb-2 text-dark dark:text-white">Card With</h6>
        <div class="flex flex-row gap-3 customizer-box mb-8" role="group">
            <input type="radio" class="btn-check" name="card-layout" id="card-with-border" autocomplete="off"/>
            <label
                class="btn btn-outline border border-border dark:border-darkborder text-link dark:text-darklink h-full py-3 px-5 cursor-pointer"
                for="card-with-border"><i
                    class="icon ti ti-border-outer text-2xl me-2"></i>Border</label>

            <input type="radio" class="btn-check" name="card-layout" id="card-without-border" autocomplete="off"/>
            <label
                class="btn btn-outline border border-border dark:border-darkborder text-link dark:text-darklink h-full py-3 px-5 cursor-pointer"
                for="card-without-border">
                <i class="icon ti ti-border-none text-2xl me-2"></i>Shadow</label>
        </div>

    </div>
</div>

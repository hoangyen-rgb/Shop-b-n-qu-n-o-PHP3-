<!-- css global -->
<style>
    :root {
        --red: #c34439;
        --black: #202020;
        --lightblack: #4E4E4E;
        --gray: #BDBDBD;
        --lightgray: #faf9f8;
        --yellow: #FFB11B;
        --green: #56D237;
    }

    * {
        margin: 0px;
        padding: 0px;
        box-sizing: border-box;
    }

    body {
        font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        background-color: var(--lightgray);
        color: var(--lightblack);
    }

    a,
    a * {
        text-decoration: none;
        color: var(--lightblack);
    }

    button {
        cursor: pointer;
        border: none;
    }

    .line {
        border-bottom: 1px solid var(--gray);
        width: 100%;
        height: 1px;
        margin: 10px auto;
    }

    .vertical-line {
        border-right: 1px solid var(--gray);
        width: 1px;
        height: 100%;
    }

    .whitediv {
        background-color: white;
        border: 1px solid var(--gray);
        box-shadow: 0px 0px 5px var(--gray);
        border-radius: 10px;
    }

    .jumpAnimate {
        animation: jump 1s ease 0s 1 normal;
    }

    @keyframes jump {
        0% {
            transform: translateY(0);
        }

        20% {
            transform: translateY(0);
        }

        40% {
            transform: translateY(-30px);
        }

        50% {
            transform: translateY(0);
        }

        60% {
            transform: translateY(-15px);
        }

        80% {
            transform: translateY(0);
        }

        100% {
            transform: translateY(0);
        }
    }
</style>
<!-- style trang -->
<style>
    main {
        position: absolute;
        left: 250px;
        top: 70px;
        padding: 15px;
        padding-bottom: 0px;
        width: calc(100% - 250px);
        display: block;
    }

    header {
        position: fixed;
        width: 100%;
        border-bottom: 1px solid var(--gray);
        display: grid;
        grid-template-columns: 250px 50px auto;
        height: 70px;
        z-index: 2;
        background-color: var(--lightgray);
    }

    header svg {
        cursor: pointer;

    }

    .logo {

        border-bottom: 1px solid var(--gray);
        background: linear-gradient(270deg, var(--red) 1.51%, var(--yellow) 97.91%);
        display: flex;
        justify-content: center;
        align-items: center;
        width: 100%;
    }

    header .logo>img {
        width: 150px;
        height: auto;
        border: unset;
        background: unset;
    }

    header .left {
        display: flex;
        justify-content: center;
        align-items: center;
    }

    header .right {
        display: flex;
        justify-content: end;
        align-items: center;

    }

    header .right>* {
        margin: 0px 20px;
    }

    header .right .avt {
        border-radius: 50%;
        width: 35px;
        height: 35px;
    }

    .sidebar {
        width: 250px;
        height: 100vh;
        border-right: 1px solid var(--gray);
        background-color: white;
        position: fixed;
        top: 70px;
    }

    .sidebar ul {
        list-style: none;
        padding: 0px;
        margin: 0px;
    }

    .sidebar ul a {
        box-sizing: border-box;
        height: 60px;
        padding-left: 20px;
        color: var(--lightblack);
        display: flex;
        justify-content: start;
        align-items: center;
        position: relative;
        font-size: 18px;
        font-weight: 600;
    }

    .sidebar ul a:hover {
        cursor: pointer;
        background-color: rgb(245, 245, 245);
    }

    .sidebar ul a svg {
        margin-right: 10px;
    }

    .sidebar ul a svg path {

        fill: var(--lightblack);
    }

    .topbar {
        width: 100%;
        background-color: white;
        border-bottom: 1px solid var(--gray);
    }

    .sidebar ul>:not(.selected) .border {
        display: none;
    }

    .sidebar ul>.selected .border {
        display: block;
        position: absolute;
        left: 0px;
        width: 4px;
        height: 70%;
        border-radius: 2px;
        background-color: var(--red);
    }

    .sidebar .selected span,
    .sidebar .selected svg path {
        color: var(--red);
        fill: var(--red);
    }
</style>


<header>
    <div class="logo">
    </div>
    <div class="left">
        <svg width="28" height="20" viewBox="0 0 28 20" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path
                d="M26.6875 17.3913C27.4123 17.3913 28 17.9753 28 18.6957C28 19.356 27.5062 19.9017 26.8656 19.9881L26.6875 20H1.3125C0.587633 20 0 19.416 0 18.6957C0 18.0353 0.493774 17.4896 1.1344 17.4032L1.3125 17.3913H26.6875ZM26.6875 8.69565C27.4123 8.69565 28 9.27963 28 10C28 10.7203 27.4123 11.3043 26.6875 11.3043H1.3125C0.587633 11.3043 0 10.7203 0 10C0 9.27963 0.587633 8.69565 1.3125 8.69565H26.6875ZM26.6875 0C27.4123 0 28 0.583983 28 1.30435C28 2.02471 27.4123 2.6087 26.6875 2.6087H1.3125C0.587633 2.6087 0 2.02471 0 1.30435C0 0.583983 0.587633 0 1.3125 0H26.6875Z"
                fill="#BDBDBD" />
        </svg>
    </div>
    <div class="right">
        <svg width="18" height="20" viewBox="0 0 18 20" fill="none" xmlns="http://www.w3.org/2000/svg">
            <rect width="18" height="20" fill="#F5F5F5" />
            <g id="Th&#225;&#187;&#145;ng k&#195;&#170;" clip-path="url(#clip0_297_245)">
                <rect width="1440" height="1024" transform="translate(-1176 -31)" fill="#FAFAFA" />
                <g id="Group 57">
                    <g id="Group 55">
                        <g id="Rectangle 82">
                            <mask id="path-1-inside-1_297_245" fill="white">
                                <path d="M-926 -31H264V49H-926V-31Z" />
                            </mask>
                            <path d="M-926 -31H264V49H-926V-31Z" fill="white" />
                            <path d="M264 48H-926V50H264V48Z" fill="#BDBDBD" mask="url(#path-1-inside-1_297_245)" />
                        </g>
                        <g id="Group">
                            <path id="Vector"
                                d="M1.63638 7.5C1.63638 3.35787 4.93318 0 9 0C13.0668 0 16.3636 3.35787 16.3636 7.5V10.6729L17.9414 14.6905C18.0423 14.9473 18.0116 15.2382 17.8592 15.4672C17.7071 15.6962 17.4533 15.8333 17.1818 15.8333H0.81818C0.546692 15.8333 0.292876 15.6962 0.140678 15.4672C-0.0115362 15.2382 -0.0422998 14.9472 0.0585164 14.6905L1.63638 10.6729V7.5Z"
                                fill="#BDBDBD" />
                            <path id="Vector_2"
                                d="M5.82935 17.5C6.19069 18.9412 7.46895 20 8.99988 20C10.5308 20 11.8091 18.9412 12.1704 17.5H5.82935Z"
                                fill="#BDBDBD" />
                        </g>
                    </g>
                </g>
            </g>
            <defs>
                <clipPath id="clip0_297_245">
                    <rect width="1440" height="1024" fill="white" transform="translate(-1176 -31)" />
                </clipPath>
            </defs>
        </svg>
        <svg width="24" height="20" viewBox="0 0 24 20" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path d="M4 0C1.79086 0 0 1.79086 0 4V4.4026L12.0002 10.8642L24 4.40282V4C24 1.79086 22.2092 0 20 0H4Z"
                fill="#BDBDBD" />
            <path
                d="M24 6.67427L12.4743 12.8804C12.1783 13.0398 11.8221 13.0398 11.5261 12.8804L0 6.67407V16C0 18.2092 1.79086 20 4 20H20C22.2092 20 24 18.2092 24 16V6.67427Z"
                fill="#BDBDBD" />
        </svg>
        <a href="#">
            <img class="avt" src="#" alt="">
        </a>
        <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path
                d="M0.0299149 6.92078C0.48508 5.5771 1.23487 4.34368 2.22421 3.2984C2.3915 3.12164 2.65397 3.05864 2.88896 3.13885L5.25327 3.94579C5.89426 4.16444 6.59958 3.84568 6.82864 3.23383C6.85116 3.17366 6.86852 3.11186 6.8805 3.0491L7.33094 0.689097C7.37572 0.454452 7.56452 0.26884 7.80892 0.219173C8.52401 0.0738913 9.2572 0 10 0C10.7423 0 11.4751 0.0738079 12.1898 0.218906C12.4341 0.268523 12.6229 0.454018 12.6678 0.68858L13.1195 3.049C13.2416 3.6882 13.8834 4.11187 14.5531 3.99532C14.619 3.98385 14.6837 3.96729 14.7467 3.94582L17.111 3.13885C17.346 3.05864 17.6084 3.12164 17.7757 3.2984C18.7651 4.34368 19.5148 5.5771 19.9701 6.92078C20.0468 7.14746 19.9728 7.39597 19.7825 7.55016L17.8661 9.10321C17.3474 9.52377 17.2839 10.2662 17.7244 10.7615C17.7677 10.8102 17.8152 10.8554 17.8661 10.8968L19.7825 12.4498C19.9728 12.604 20.0468 12.8525 19.9701 13.0792C19.5148 14.423 18.7651 15.6564 17.7757 16.7016C17.6084 16.8783 17.346 16.9413 17.111 16.8611L14.7467 16.0542C14.1058 15.8356 13.4004 16.1544 13.1714 16.7661C13.1488 16.8263 13.1315 16.8881 13.1194 16.9511L12.6678 19.3114C12.6229 19.546 12.4341 19.7314 12.1898 19.7811C11.4751 19.9261 10.7423 20 10 20C9.2572 20 8.52401 19.9261 7.80892 19.7808C7.56452 19.7311 7.37572 19.5455 7.33094 19.3109L6.88052 16.951C6.7584 16.3118 6.11655 15.8881 5.4469 16.0047C5.38104 16.0162 5.31629 16.0327 5.25337 16.0542L2.88896 16.8611C2.65397 16.9413 2.3915 16.8783 2.22421 16.7016C1.23487 15.6564 0.48508 14.423 0.0299149 13.0792C-0.0468676 12.8525 0.0271668 12.604 0.217445 12.4498L2.13379 10.8968C2.65266 10.4762 2.71612 9.73379 2.27555 9.2385C2.23223 9.18981 2.18482 9.14456 2.13381 9.10322L0.217445 7.55016C0.0271668 7.39597 -0.0468676 7.14746 0.0299149 6.92078ZM6.95631 9.99989C6.95631 11.6113 8.31892 12.9175 9.99979 12.9175C11.6807 12.9175 13.0433 11.6113 13.0433 9.99989C13.0433 8.38852 11.6807 7.08225 9.99979 7.08225C8.31892 7.08225 6.95631 8.38852 6.95631 9.99989Z"
                fill="#BDBDBD" />
        </svg>
    </div>
</header>
<div class="sidebar">
    <ul>
        <a data-name="thongke" href="{{ route('admin.index') }}">
            <div class="border"></div>
            <svg width="15" height="15" viewBox="0 0 15 15" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path
                    d="M15 14.1964C15 14.6402 14.6402 15 14.1964 15H1.875C0.839464 15 0 14.1605 0 13.125V0.803571C0 0.359775 0.359775 0 0.803571 0C1.24737 0 1.60714 0.359775 1.60714 0.803571V13.125C1.60714 13.273 1.72707 13.3929 1.875 13.3929H14.1964C14.6402 13.3929 15 13.7526 15 14.1964Z" />
                <path
                    d="M9.64299 2.94642C9.64299 2.50263 10.0028 2.14285 10.4466 2.14285H14.1966C14.6404 2.14285 15.0001 2.50263 15.0001 2.94642V6.69642C15.0001 7.14022 14.6404 7.5 14.1966 7.5C13.7528 7.5 13.393 7.14022 13.393 6.69642V4.88638L9.13974 9.1396C8.9891 9.29035 8.78467 9.375 8.57157 9.375C8.35846 9.375 8.15403 9.29035 8.00328 9.1396L6.42871 7.56503L4.05049 9.94317C3.73668 10.257 3.22788 10.257 2.91407 9.94317C2.60026 9.62935 2.60026 9.12064 2.91407 8.80682L5.8605 5.86036C6.01119 5.70966 6.21559 5.625 6.42871 5.625C6.64184 5.625 6.84622 5.70966 6.99692 5.86036L8.57157 7.435L12.2565 3.75H10.4466C10.0028 3.75 9.64299 3.39022 9.64299 2.94642Z" />
            </svg>
            <span>Thống kê</span>
        </a>
        <a data-name="quanlysanpham" href="{{ route('admin.product') }}">
            <div class="border"></div>
            <svg width="15" height="15" viewBox="0 0 15 15" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path
                    d="M0 1.25C0 0.55965 0.55965 0 1.25 0H13.75C14.4404 0 15 0.55965 15 1.25V2.5C15 3.19035 14.4404 3.75 13.75 3.75H1.25C0.55965 3.75 0 3.19035 0 2.5V1.25Z" />
                <path
                    d="M1.25 5V12.5C1.25 13.8807 2.36929 15 3.75 15H11.25C12.6308 15 13.75 13.8807 13.75 12.5V5H1.25ZM6.25 6.25H8.75C9.09518 6.25 9.375 6.52982 9.375 6.875C9.375 7.22018 9.09518 7.5 8.75 7.5H6.25C5.90483 7.5 5.625 7.22018 5.625 6.875C5.625 6.52982 5.90483 6.25 6.25 6.25Z" />
            </svg>

            <span>Quản lý sản phẩm</span>
        </a>
        <a data-name="quanlydanhmuc" href="{{ route('admin.category') }}">
            <div class="border"></div>
            <svg width="13" height="15" viewBox="0 0 13 15" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path
                    d="M0.971832 14.8938C0.556611 15.171 0 14.8734 0 14.3741V2.51287C0 1.13422 1.1163 0.0159194 2.49494 0.0134495L9.9932 4.05791e-06C11.3736 -0.0024567 12.4946 1.11456 12.4971 2.49495V14.3741C12.4971 14.8734 11.9405 15.171 11.5253 14.8938L6.24855 11.3705L0.971832 14.8938Z" />
            </svg>
            <span>Quản lý danh mục</span>
        </a>
        <a data-name="quanlynguoidung" href="{{ route('admin.usermanage') }}">
            <div class="border"></div>
            <svg width="12" height="15" viewBox="0 0 12 15" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path
                    d="M9.75 7.5C10.9926 7.5 12 8.50735 12 9.75C12 11.4241 11.3115 12.7654 10.1818 13.6722C9.06987 14.5647 7.57962 15 6 15C4.42038 15 2.93013 14.5647 1.81823 13.6722C0.688455 12.7654 0 11.4241 0 9.75C0 8.58051 0.892315 7.61933 2.03328 7.5103L2.24997 7.5H9.75ZM6 0C7.65686 0 9 1.34314 9 3C9 4.65686 7.65686 6 6 6C4.34314 6 3 4.65686 3 3C3 1.34314 4.34314 0 6 0Z" />
            </svg>

            <span>Quản lý người dùng</span>
        </a>
        <a data-name="quanlydonhang" href="{{ route('admin.bill') }}">
            <div class="border"></div>
            <svg width="15" height="15" viewBox="0 0 15 15" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path
                    d="M2.14286 0C0.959389 0 0 0.959389 0 2.14286V12.8571C0 14.0406 0.959389 15 2.14286 15H12.8571C14.0406 15 15 14.0406 15 12.8571V2.14286C15 0.959389 14.0406 0 12.8571 0H2.14286ZM4.82143 4.55357C4.82143 4.99737 4.46165 5.35714 4.01786 5.35714C3.57406 5.35714 3.21429 4.99737 3.21429 4.55357C3.21429 4.10978 3.57406 3.75 4.01786 3.75C4.46165 3.75 4.82143 4.10978 4.82143 4.55357ZM4.01786 8.57143C3.57406 8.57143 3.21429 8.21164 3.21429 7.76786C3.21429 7.32406 3.57406 6.96429 4.01786 6.96429C4.46165 6.96429 4.82143 7.32406 4.82143 7.76786C4.82143 8.21164 4.46165 8.57143 4.01786 8.57143ZM4.82143 10.9821C4.82143 11.4259 4.46165 11.7857 4.01786 11.7857C3.57406 11.7857 3.21429 11.4259 3.21429 10.9821C3.21429 10.5384 3.57406 10.1786 4.01786 10.1786C4.46165 10.1786 4.82143 10.5384 4.82143 10.9821ZM6.96429 4.28571H11.25C11.5458 4.28571 11.7857 4.52556 11.7857 4.82143C11.7857 5.11729 11.5458 5.35714 11.25 5.35714H6.96429C6.66842 5.35714 6.42857 5.11729 6.42857 4.82143C6.42857 4.52556 6.66842 4.28571 6.96429 4.28571ZM6.42857 8.03571C6.42857 7.73989 6.66842 7.5 6.96429 7.5H11.25C11.5458 7.5 11.7857 7.73989 11.7857 8.03571C11.7857 8.33154 11.5458 8.57143 11.25 8.57143H6.96429C6.66842 8.57143 6.42857 8.33154 6.42857 8.03571ZM6.96429 10.7143H11.25C11.5458 10.7143 11.7857 10.9542 11.7857 11.25C11.7857 11.5458 11.5458 11.7857 11.25 11.7857H6.96429C6.66842 11.7857 6.42857 11.5458 6.42857 11.25C6.42857 10.9542 6.66842 10.7143 6.96429 10.7143Z" />
            </svg>

            <span>Quản lý đơn hàng</span>
        </a>
        <a data-name="quanlydanhgia" href="{{ route('admin.posttt') }}">
            <div class="border"></div>
            <svg width="15" height="15" viewBox="0 0 15 15" fill="none"
                xmlns="http://www.w3.org/2000/svg">
                <path
                    d="M7.96875 9.375C8.74537 9.375 9.375 10.0046 9.375 10.7812V11.25C9.375 13.0982 7.63172 15 4.6875 15C1.74329 15 0 13.0982 0 11.25V10.7812C0 10.0046 0.629597 9.375 1.40625 9.375H7.96875ZM4.6875 3.28125C6.11136 3.28125 7.26562 4.43552 7.26562 5.85938C7.26562 7.28323 6.11136 8.4375 4.6875 8.4375C3.26364 8.4375 2.10938 7.28323 2.10938 5.85938C2.10938 4.43552 3.26364 3.28125 4.6875 3.28125ZM13.125 0C14.1135 0 14.9233 0.764887 14.9948 1.73507L15 1.875V3.75C15 4.73846 14.2351 5.54828 13.265 5.61985L13.125 5.625H11.7178L10.5947 7.1248C10.0984 7.78687 9.09047 7.51866 8.92903 6.77274L8.91244 6.6681L8.907 6.5625L8.90625 5.56406L8.8335 5.54561C8.15344 5.3408 7.63613 4.76018 7.52306 4.04513L7.50516 3.88993L7.5 3.75V1.875C7.5 0.886537 8.26491 0.0767157 9.23503 0.00514694L9.375 0H13.125Z" />
            </svg>
            <span>Quản lý bài viết</span>
        </a>
    </ul>
</div>

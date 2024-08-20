@extends('layout.layoutadmin')
@section('titleadmin', 'Thống kê')
@section('contentadmin')
    <!-- css global -->
    <style>
        :root {
            --red: #c34439;
            --black: #202020;
            --lightblack: #4E4E4E;
            --gray: #BDBDBD;
            --lightgray: #faf9f8;
            --yellow: #FFB11B;
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
            margin: auto 10px;
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

        main {
            position: absolute;
            left: 250px;
            top: 70px;
            padding: 15px;
            width: calc(100% - 250px);
            display: block;
        }
    </style>
    <!-- style trang -->
    <style>
        .statistics {
            display: grid;
            width: 100%;
            grid-template-columns: auto 300px;
            gap: 15px;
            height: 400px;
        }

        .statistics>* {
            background-color: white;
            border-radius: 10px;
            padding: 15px !important;
            border: 1px solid var(--gray);
        }

        .statistics .revenue {
            display: grid;
            width: 100%;
            grid-template-columns: 300px auto;
            grid-template-rows: 30px auto 10px 70px;
            row-gap: 10px;
        }

        .revenue .top {
            grid-column: 1 / 3;
            grid-row: 1 / 2;
            display: grid;
            grid-template-columns: 1fr 1fr;
        }

        .revenue .left {
            grid-column: 1 / 2;
            grid-row: 2 / 3;
            display: grid;
            gap: 0px;
        }

        .revenue .right {
            grid-column: 2 / 3;
            grid-row: 2 / 3;
        }

        .revenue .bottom {
            grid-column: 1 / 3;
            grid-row: 4 / 5;
            margin: 0px;
            display: grid;
            grid-template-columns: 1fr 0px 1fr 0px 1fr 0px 1fr;
            column-gap: 10px;
        }

        .revenue .title {
            font-display: 16px;
            font-weight: 600;
            justify-self: start;
        }

        .revenue .legends {
            justify-self: end;
        }

        .revenue .legends .legend {
            display: inline-block;
            margin-left: 20px;
        }

        .revenue .legends .legend>* {
            display: inline-block;
        }

        .revenue .legends .legend div {
            width: 10px;
            height: 10px;
            border-radius: 5px;
            margin-right: 5px;
        }

        .revenue .legends .legend .import {
            background-color: var(--red);
        }

        .revenue .legends .legend .sell {
            background-color: var(--yellow);
        }

        .total-order-current,
        .total-revenue-current {
            font-size: 24px;
            font-weight: 600;
            margin-top: 5px;
            height: 20px;
        }

        .total-revenue-current {
            margin-top: 0px;
        }

        .revenue .normal {
            height: 16px;
            font-size: 12px;
            font-weight: 600;
            color: var(--gray);
            margin-top: 0px;
        }

        .revenue .left button {
            margin-top: 20px;
            justify-self: center;
            width: 150px;
            background-color: var(--red);
            color: white;
            font-size: 12px;
            font-weight: 600;
            border-radius: 5px;
            padding: 5px 10px;
        }

        .bottom-statistic {
            display: grid;
            grid-template-columns: 40px auto;
            gap: 5px 10px;
            justify-self: center;
        }

        .bottom-statistic .icon {
            width: 40px;
            height: 40px;
            border-radius: 20px;
            display: flex;
            justify-content: center;
            align-items: center;
            grid-column: 1 / 2;
            grid-row: 1 / 3;
            align-self: center;
        }

        .bottom-statistic p {
            align-self: flex-start;
            font-size: 14px;
            font-weight: 600;
        }

        .bottom-statistic .normal {
            align-self: flex-end;
        }

        /* .statistics .revenue .right {
                                                                                                                                                                                                                                            width: 100%;
                                                                                                                                                                                                                                            height: 100%;
                                                                                                                                                                                                                                            grid-column: 2 / 3;
                                                                                                                                                                                                                                            grid-row: 2 / 3;
                                                                                                                                                                                                                                        }
                                                                                                                                                                                                                                        .statistics .revenue .right .legends {
                                                                                                                                                                                                                                            width: 100%;
                                                                                                                                                                                                                                            text-align: right;
                                                                                                                                                                                                                                            display: flex;
                                                                                                                                                                                                                                            justify-content: end;
                                                                                                                                                                                                                                        }
                                                                                                                                                                                                                                        .statistics .revenue .right .legends .legend {
                                                                                                                                                                                                                                            display: flex;
                                                                                                                                                                                                                                            justify-content: start;
                                                                                                                                                                                                                                            align-items: center;
                                                                                                                                                                                                                                            width: 100px;
                                                                                                                                                                                                                                            margin-left: 20px;
                                                                                                                                                                                                                                        }
                                                                                                                                                                                                                                        .statistics .revenue .right .legends .legend .import {
                                                                                                                                                                                                                                            width: 10px;
                                                                                                                                                                                                                                            height: 10px;
                                                                                                                                                                                                                                            border-radius: 5px;
                                                                                                                                                                                                                                            background-color: var(--yellow);
                                                                                                                                                                                                                                            margin-right: 10px;
                                                                                                                                                                                                                                        }
                                                                                                                                                                                                                                        .statistics .revenue .right .legends .legend .sell {
                                                                                                                                                                                                                                            width: 10px;
                                                                                                                                                                                                                                            height: 10px;
                                                                                                                                                                                                                                            border-radius: 5px;
                                                                                                                                                                                                                                            background-color: var(--red);
                                                                                                                                                                                                                                            margin-right: 10px;
                                                                                                                                                                                                                                        }
                                                                                                                                                                                                                                        .statistics .revenue .bottom {
                                                                                                                                                                                                                                            grid-column: 1 / 3;
                                                                                                                                                                                                                                            grid-row: 3 / 4;
                                                                                                                                                                                                                                        }
                                                                                                                                                                                                                                        .statistics .revenue p {
                                                                                                                                                                                                                                            display: block;
                                                                                                                                                                                                                                            width: 100%;
                                                                                                                                                                                                                                            text-align: left;
                                                                                                                                                                                                                                        } */
        .statistics .order {
            display: grid;
            grid-template-columns: 1fr 1px 1fr;
            grid-template-rows: 30px auto 50px;
            padding: 15px !important;
            overflow: hidden;
            height: 100%;
            column-gap: 10px;
        }

        .statistics .order>p {
            height: 20px;
            grid-column: 1 / 4;
        }

        .statistics .order .chart {
            grid-column: 1 / 4;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .statistics .order .legend>p {
            font-size: 24px;
            font-weight: 600;
        }

        .statistics .order .legend .success,
        .statistics .order .legend .failure {
            width: 10px;
            height: 10px;
            border-radius: 5px;
            margin-right: 15px;
        }

        .statistics .order .legend>div {
            display: flex;
            justify-content: start;
            align-items: center;
        }

        .statistics .order .legend .success {
            background-color: var(--red);
        }

        .statistics .order .legend .failure {
            background-color: var(--yellow);
        }

        .statistics .order .legend div p {
            font-size: 12px;
            font-weight: 400;
        }

        .statistics-total {
            padding-top: 7%;
            width: 100%;
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 15px;
        }

        .statistics-total>* {
            width: 100%;
            height: 120px;
            border-radius: 10px;
            position: relative;
        }

        .statistics-total .product {
            background: linear-gradient(-45deg, #6692D9 25.73%, #45C4F1 72.52%);
        }

        .statistics-total .category {
            background: linear-gradient(-45deg, #5546B9 26.29%, #875FC0 74.94%);
        }

        .statistics-total .user {
            background: linear-gradient(-45deg, #B954A4 28.01%, #EC4887 66.14%);
        }

        .statistics-total .invoice {
            background: linear-gradient(-45deg, #F57F59 32.22%, #FFB82C 66.53%);
        }

        .statistics-total .feedback {
            background: linear-gradient(-45deg, #57D2CA 33.73%, #45F1A9 72.23%);
        }

        .statistics-total svg {
            fill: white;
            position: absolute;
            top: 10px;
            left: 10px;
            filter: drop-shadow(0px 4px 4px rgba(0, 0, 0, 0.25));
        }

        .statistics-total>* .name {
            color: white;
            font-size: 20px;
            position: absolute;
            bottom: 10px;
            left: 10px;
        }

        .statistics-total>* .count {
            color: white;
            font-size: 30px;
            font-weight: bold;
            position: absolute;
            top: 50%;
            transform: translate(0, -50%);
            right: 10px;
            text-align: right;
        }



        /*-----------*/
        .chart {
            height: 100%;
            width: 100%;
        }
    </style>
    <div class="statistics">
        <div class="revenue">
            <div class="top">
                <p class="title">Thống kê doanh thu</p>
                <div class="legends">
                    <div class="legend">
                        <div class="import"></div>
                        <p>Nhập vào</p>
                    </div>
                    <div class="legend">
                        <div class="sell"></div>
                        <p>Bán ra</p>
                    </div>
                </div>
            </div>
            <div class="left">
                <p class="small">Toàn bộ</p>
                <p class="total-revenue-current">100.000.000 vnđ</p>
                <p class="small">Tổng doanh thu tháng hiện tại</p>
                <p class="total-order-current">425</p>
                <p class="small">Tổng đơn hàng tháng hiện tại</p>
                <button>Xem tháng trước</button>
            </div>
            <div class="right">
                <canvas id="lineChart"></canvas>
            </div>
            <div class="line" style="grid-column: 1 / 3;"></div>
            <div class="bottom">
                <div class="bottom-statistic">
                    <div class="icon" style="background-color: #45C4F1;">
                        <svg width="26" height="20" viewBox="0 0 26 20" fill="none"
                            xmlns="http://www.w3.org/2000/svg">
                            <path id="Vector"
                                d="M0 2.5C0 1.11928 1.03932 0 2.3214 0H19.964C21.2462 0 22.2854 1.11928 22.2854 2.5V13.5C22.2854 14.8808 21.2462 16 19.964 16H2.3214C1.03932 16 0 14.8808 0 13.5V2.5ZM5.57135 3V2H3.71423V3C3.71423 3.55228 3.2985 4 2.78567 4H1.85712V6H2.78567C4.32416 6 5.57135 4.65686 5.57135 3ZM14.8569 7.99999C14.8569 5.79086 13.194 4 11.1427 4C9.09138 4 7.42846 5.79086 7.42846 7.99999C7.42846 10.2091 9.09138 12 11.1427 12C13.194 12 14.8569 10.2091 14.8569 7.99999ZM18.5712 2H16.714V3C16.714 4.65686 17.9613 6 19.4997 6H20.4283V4H19.4997C18.987 4 18.5712 3.55228 18.5712 3V2ZM5.57135 13C5.57135 11.3431 4.32416 9.99999 2.78567 9.99999H1.85712V12H2.78567C3.2985 12 3.71423 12.4477 3.71423 13V14H5.57135V13ZM18.5712 14V13C18.5712 12.4477 18.987 12 19.4997 12H20.4283V9.99999H19.4997C17.9613 9.99999 16.714 11.3431 16.714 13V14H18.5712Z"
                                fill="white" />
                            <path id="Vector_2"
                                d="M6.50013 20C5.26217 20 4.21283 19.1304 3.8501 17.9274C4.10777 17.9752 4.37269 18 4.64301 18H19.9642C22.2719 18 24.1427 15.9852 24.1427 13.5V4.17072C25.2247 4.58255 25.9998 5.69379 25.9998 7.00001V13.5C25.9998 17.0898 23.2976 20 19.9642 20H6.50013Z"
                                fill="white" />
                        </svg>
                    </div>
                    <p class="normal">Doanh thu</p>
                    <p>100.000 vnđ</p>
                </div>
                <div class="vertical-line" style="margin: 0px !important;"></div>
                <div class="bottom-statistic">
                    <div class="icon" style="background-color: #865DBC;">
                        <svg width="20" height="20" viewBox="0 0 20 20" fill="none"
                            xmlns="http://www.w3.org/2000/svg">
                            <g id="Group">
                                <path id="Vector"
                                    d="M20 18.9286C20 19.5203 19.5203 20 18.9286 20H2.5C1.11929 20 0 18.8807 0 17.5V1.07143C0 0.4797 0.4797 0 1.07143 0C1.66316 0 2.14286 0.4797 2.14286 1.07143V17.5C2.14286 17.6973 2.30276 17.8571 2.5 17.8571H18.9286C19.5203 17.8571 20 18.3369 20 18.9286Z"
                                    fill="white" />
                                <path id="Vector_2"
                                    d="M12.8572 3.92861C12.8572 3.33688 13.337 2.85718 13.9287 2.85718H18.9287C19.5204 2.85718 20.0001 3.33688 20.0001 3.92861V8.92861C20.0001 9.52034 19.5204 10 18.9287 10C18.337 10 17.8572 9.52034 17.8572 8.92861V6.51522L12.1862 12.1862C11.9854 12.3872 11.7128 12.5 11.4287 12.5C11.1445 12.5 10.872 12.3872 10.671 12.1862L8.57153 10.0868L5.40057 13.2576C4.98216 13.676 4.30376 13.676 3.88534 13.2576C3.46693 12.8392 3.46693 12.1609 3.88534 11.7425L7.81392 7.81385C8.01484 7.61292 8.28737 7.50003 8.57153 7.50003C8.8557 7.50003 9.12821 7.61292 9.32914 7.81385L11.4287 9.91338L16.342 5.00003H13.9287C13.337 5.00003 12.8572 4.52033 12.8572 3.92861Z"
                                    fill="white" />
                            </g>
                        </svg>
                    </div>
                    <p class="normal">Tỉ suất</p>
                    <p>100.000 vnđ</p>
                </div>
                <div class="vertical-line" style="margin: 0px !important;"></div>
                <div class="bottom-statistic">
                    <div class="icon" style="background-color: #C34439;">
                        <svg width="22" height="25" viewBox="0 0 22 25" fill="none"
                            xmlns="http://www.w3.org/2000/svg">
                            <g id="Group">
                                <path id="Vector"
                                    d="M22 6.61765C22 10.2725 19.0452 13.2353 15.4 13.2353C11.7549 13.2353 8.80005 10.2725 8.80005 6.61765C8.80005 2.96282 11.7549 0 15.4 0C19.0452 0 22 2.96282 22 6.61765ZM15.9191 3.15721L15.9154 3.15352C15.8459 3.08456 15.766 3.0324 15.6808 2.99704C15.5956 2.96163 15.5023 2.94185 15.4044 2.94127H15.4H15.3956C15.2978 2.94185 15.2045 2.96163 15.1193 2.99704C15.0328 3.03293 14.9518 3.08612 14.8814 3.15662L11.9481 6.09779C11.6618 6.38494 11.6618 6.85052 11.9481 7.13766C12.2345 7.42481 12.6989 7.42481 12.9852 7.13766L14.6667 5.45171V9.55891C14.6667 9.965 14.995 10.2942 15.4 10.2942C15.805 10.2942 16.1334 9.965 16.1334 9.55891V5.45171L17.8148 7.13766C18.1012 7.42481 18.5656 7.42481 18.8518 7.13766C19.1383 6.85052 19.1383 6.38494 18.8518 6.09779L15.9191 3.15721Z"
                                    fill="white" />
                                <path id="Vector_2"
                                    d="M19.0667 13.824V14.7059H13.9333C13.5293 14.7059 13.2016 15.0335 13.2 15.4382V15.4398L13.1996 15.4579C13.199 15.4762 13.1975 15.5063 13.1947 15.5467C13.189 15.6278 13.177 15.7482 13.1526 15.8947C13.1033 16.1913 13.0063 16.5754 12.8191 16.9506C12.6334 17.3229 12.3665 17.6729 11.9797 17.9313C11.5975 18.1869 11.055 18.3823 10.2667 18.3823C9.47832 18.3823 8.93581 18.1869 8.55366 17.9313C8.1669 17.6729 7.89992 17.3229 7.71424 16.9506C7.52714 16.5754 7.42993 16.1913 7.38065 15.8947C7.35629 15.7482 7.34441 15.6278 7.33863 15.5467C7.33575 15.5063 7.33443 15.4762 7.33382 15.4579L7.33335 15.4398C7.33286 15.0342 7.00471 14.7059 6.6 14.7059H1.46667V8.82351C1.46667 7.19914 2.77996 5.88233 4.4 5.88233H7.36622C7.41161 5.37732 7.50329 4.88568 7.63698 4.41174H4.4C1.96995 4.41174 0 6.38696 0 8.82351V20.5882C0 23.0248 1.96995 25 4.4 25H16.1333C18.5635 25 20.5333 23.0248 20.5333 20.5882V12.8571C20.0829 13.2301 19.5914 13.555 19.0667 13.824Z"
                                    fill="white" />
                            </g>
                        </svg>

                    </div>
                    <p class="normal">Bán ra</p>
                    <p>100.000 vnđ</p>
                </div>
                <div class="vertical-line" style="margin: 0px !important;"></div>
                <div class="bottom-statistic">
                    <div class="icon" style="background-color: #FFB72B;">
                        <svg width="22" height="25" viewBox="0 0 22 25" fill="none"
                            xmlns="http://www.w3.org/2000/svg">
                            <g id="Group">
                                <path id="Vector"
                                    d="M8.8 6.61764C8.8 2.96282 11.7549 -4.76837e-06 15.4 -4.76837e-06C19.0451 -4.76837e-06 22 2.96282 22 6.61764C22 10.2725 19.0451 13.2353 15.4 13.2353C11.7549 13.2353 8.8 10.2725 8.8 6.61764ZM14.8809 10.0781L14.8846 10.0818C14.9541 10.1507 15.0341 10.2029 15.1193 10.2382C15.2045 10.2737 15.2978 10.2934 15.3956 10.294H15.4H15.4044C15.5022 10.2934 15.5955 10.2737 15.6807 10.2382C15.7673 10.2024 15.8482 10.1492 15.9186 10.0787L18.8519 7.1375C19.1382 6.85035 19.1382 6.38478 18.8519 6.09763C18.5655 5.81048 18.1012 5.81048 17.8149 6.09763L16.1333 7.78358V3.67638C16.1333 3.27029 15.8051 2.94108 15.4 2.94108C14.9951 2.94108 14.6667 3.27029 14.6667 3.67638V7.78358L12.9853 6.09763C12.6988 5.81048 12.2345 5.81048 11.9482 6.09763C11.6618 6.38478 11.6618 6.85035 11.9482 7.1375L14.8809 10.0781Z"
                                    fill="white" />
                                <path id="Vector_2"
                                    d="M19.0667 13.824V14.7059H13.9333C13.5293 14.7059 13.2016 15.0336 13.2 15.4383V15.4399L13.1996 15.458C13.199 15.4762 13.1975 15.5064 13.1947 15.5468C13.189 15.6278 13.177 15.7483 13.1526 15.8947C13.1033 16.1914 13.0063 16.5755 12.8191 16.9506C12.6334 17.323 12.3665 17.673 11.9797 17.9314C11.5975 18.187 11.055 18.3824 10.2667 18.3824C9.47832 18.3824 8.93581 18.187 8.55366 17.9314C8.1669 17.673 7.89992 17.323 7.71424 16.9506C7.52714 16.5755 7.42993 16.1914 7.38065 15.8947C7.35629 15.7483 7.34441 15.6278 7.33863 15.5468C7.33575 15.5064 7.33443 15.4762 7.33382 15.458L7.33335 15.4399C7.33286 15.0343 7.00471 14.7059 6.6 14.7059H1.46667V8.82357C1.46667 7.1992 2.77996 5.88239 4.4 5.88239H7.36622C7.41161 5.37738 7.50329 4.88575 7.63698 4.4118H4.4C1.96995 4.4118 0 6.38703 0 8.82357V20.5883C0 23.0249 1.96995 25 4.4 25H16.1333C18.5635 25 20.5333 23.0249 20.5333 20.5883V12.8572C20.0829 13.2301 19.5914 13.555 19.0667 13.824Z"
                                    fill="white" />
                            </g>
                        </svg>
                    </div>
                    <p class="normal">Nhập vào</p>
                    <p>100.000 vnđ</p>
                </div>
            </div>
        </div>
        <div class="order">
            <p class="title">Thống kê đơn hàng</p>
            <canvas id='pieChart'></canvas>
        </div>
    </div>
    <div class="statistics-total">
        <div class="product">
            <svg width="45" height="45" viewBox="0 0 15 15" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path
                    d="M0 1.25C0 0.55965 0.55965 0 1.25 0H13.75C14.4404 0 15 0.55965 15 1.25V2.5C15 3.19035 14.4404 3.75 13.75 3.75H1.25C0.55965 3.75 0 3.19035 0 2.5V1.25Z" />
                <path
                    d="M1.25 5V12.5C1.25 13.8807 2.36929 15 3.75 15H11.25C12.6308 15 13.75 13.8807 13.75 12.5V5H1.25ZM6.25 6.25H8.75C9.09518 6.25 9.375 6.52982 9.375 6.875C9.375 7.22018 9.09518 7.5 8.75 7.5H6.25C5.90483 7.5 5.625 7.22018 5.625 6.875C5.625 6.52982 5.90483 6.25 6.25 6.25Z" />
            </svg>
            <p class="count">500</p>
            <p class="name">Tổng sản phẩm</p>
        </div>
        <div class="category">
            <svg width="39" height="45" viewBox="0 0 13 15" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path
                    d="M0.971832 14.8938C0.556611 15.171 0 14.8734 0 14.3741V2.51287C0 1.13422 1.1163 0.0159194 2.49494 0.0134495L9.9932 4.05791e-06C11.3736 -0.0024567 12.4946 1.11456 12.4971 2.49495V14.3741C12.4971 14.8734 11.9405 15.171 11.5253 14.8938L6.24855 11.3705L0.971832 14.8938Z" />
            </svg>
            <p class="count">500</p>
            <p class="name">Tổng danh mục</p>
        </div>
        <div class="user">
            <svg width="36" height="45" viewBox="0 0 12 15" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path
                    d="M9.75 7.5C10.9926 7.5 12 8.50735 12 9.75C12 11.4241 11.3115 12.7654 10.1818 13.6722C9.06987 14.5647 7.57962 15 6 15C4.42038 15 2.93013 14.5647 1.81823 13.6722C0.688455 12.7654 0 11.4241 0 9.75C0 8.58051 0.892315 7.61933 2.03328 7.5103L2.24997 7.5H9.75ZM6 0C7.65686 0 9 1.34314 9 3C9 4.65686 7.65686 6 6 6C4.34314 6 3 4.65686 3 3C3 1.34314 4.34314 0 6 0Z" />
            </svg>
            <p class="count">500</p>
            <p class="name">Tổng người dùng</p>
        </div>
        <div class="invoice">
            <svg width="45" height="45" viewBox="0 0 15 15" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path
                    d="M2.14286 0C0.959389 0 0 0.959389 0 2.14286V12.8571C0 14.0406 0.959389 15 2.14286 15H12.8571C14.0406 15 15 14.0406 15 12.8571V2.14286C15 0.959389 14.0406 0 12.8571 0H2.14286ZM4.82143 4.55357C4.82143 4.99737 4.46165 5.35714 4.01786 5.35714C3.57406 5.35714 3.21429 4.99737 3.21429 4.55357C3.21429 4.10978 3.57406 3.75 4.01786 3.75C4.46165 3.75 4.82143 4.10978 4.82143 4.55357ZM4.01786 8.57143C3.57406 8.57143 3.21429 8.21164 3.21429 7.76786C3.21429 7.32406 3.57406 6.96429 4.01786 6.96429C4.46165 6.96429 4.82143 7.32406 4.82143 7.76786C4.82143 8.21164 4.46165 8.57143 4.01786 8.57143ZM4.82143 10.9821C4.82143 11.4259 4.46165 11.7857 4.01786 11.7857C3.57406 11.7857 3.21429 11.4259 3.21429 10.9821C3.21429 10.5384 3.57406 10.1786 4.01786 10.1786C4.46165 10.1786 4.82143 10.5384 4.82143 10.9821ZM6.96429 4.28571H11.25C11.5458 4.28571 11.7857 4.52556 11.7857 4.82143C11.7857 5.11729 11.5458 5.35714 11.25 5.35714H6.96429C6.66842 5.35714 6.42857 5.11729 6.42857 4.82143C6.42857 4.52556 6.66842 4.28571 6.96429 4.28571ZM6.42857 8.03571C6.42857 7.73989 6.66842 7.5 6.96429 7.5H11.25C11.5458 7.5 11.7857 7.73989 11.7857 8.03571C11.7857 8.33154 11.5458 8.57143 11.25 8.57143H6.96429C6.66842 8.57143 6.42857 8.33154 6.42857 8.03571ZM6.96429 10.7143H11.25C11.5458 10.7143 11.7857 10.9542 11.7857 11.25C11.7857 11.5458 11.5458 11.7857 11.25 11.7857H6.96429C6.66842 11.7857 6.42857 11.5458 6.42857 11.25C6.42857 10.9542 6.66842 10.7143 6.96429 10.7143Z" />
            </svg>
            <p class="count">500</p>
            <p class="name">Tổng đơn hàng</p>
        </div>
        <div class="feedback">
            <svg width="45" height="45" viewBox="0 0 15 15" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path
                    d="M7.96875 9.375C8.74537 9.375 9.375 10.0046 9.375 10.7812V11.25C9.375 13.0982 7.63172 15 4.6875 15C1.74329 15 0 13.0982 0 11.25V10.7812C0 10.0046 0.629597 9.375 1.40625 9.375H7.96875ZM4.6875 3.28125C6.11136 3.28125 7.26562 4.43552 7.26562 5.85938C7.26562 7.28323 6.11136 8.4375 4.6875 8.4375C3.26364 8.4375 2.10938 7.28323 2.10938 5.85938C2.10938 4.43552 3.26364 3.28125 4.6875 3.28125ZM13.125 0C14.1135 0 14.9233 0.764887 14.9948 1.73507L15 1.875V3.75C15 4.73846 14.2351 5.54828 13.265 5.61985L13.125 5.625H11.7178L10.5947 7.1248C10.0984 7.78687 9.09047 7.51866 8.92903 6.77274L8.91244 6.6681L8.907 6.5625L8.90625 5.56406L8.8335 5.54561C8.15344 5.3408 7.63613 4.76018 7.52306 4.04513L7.50516 3.88993L7.5 3.75V1.875C7.5 0.886537 8.26491 0.0767157 9.23503 0.00514694L9.375 0H13.125Z" />
            </svg>
            <p class="count">500</p>
            <p class="name">Tổng đánh giá</p>
        </div>
    </div>
@endsection
<script src="https://cdn.jsdelivr.net/npm/chart.js@3.5.1"></script>
<script src="https://cdn.jsdelivr.net/npm/chartjs-plugin-datalabels@2.0.0"></script>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const lineChart = new Chart(document.getElementById('lineChart').getContext('2d'), {
            type: 'line',
            data: {
                labels: ['T1', 'T2', 'T3', 'T4', 'T5', 'T6', 'T7', 'T8', 'T9', 'T10', 'T11', 'T12'],
                datasets: [{
                    label: 'Nhập vào',
                    data: [65, 59, 80, 81, 26, 55, 40, 65, 59, 80, 81, 26],
                    fill: true,
                    backgroundColor: 'rgba(195, 68, 57, 0.2)',
                    borderColor: '#c34439',
                    tension: 0.4,
                }, {
                    label: 'Bán ra',
                    data: [85, 69, 60, 90, 36, 45, 20, 45, 19, 70, 61, 36],
                    fill: true,
                    backgroundColor: 'rgba(255, 177, 27, 0.2)',
                    borderColor: '#FFB11B',
                    tension: 0.4,
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });

        const pieChart = new Chart(document.getElementById('pieChart').getContext('2d'), {
            type: 'pie',
            data: {
                labels: ['Giao hành công', 'Huỷ đơn hàng'],
                datasets: [{
                    data: [65, 59],
                    backgroundColor: ['#c34439', '#FFB11B'],
                }]
            },
            options: {
                responsive: true,
                plugins: {
                    datalabels: {
                        formatter: (value, ctx) => {
                            let sum = ctx.dataset.data.reduce((a, b) => a + b, 0);
                            let percentage = (value * 100 / sum).toFixed(1) + "%";
                            return percentage;
                        },
                        color: '#fff',
                        font: {
                            weight: 'bold'
                        }
                    }
                }
            }
        });
    });
</script>

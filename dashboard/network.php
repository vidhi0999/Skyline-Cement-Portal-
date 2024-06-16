<head>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.3/dist/jquery.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
    <?php include('header.php') ?>

    <!-- My CSS -->
    <script src="../js/sweetalert.min.js"></script>


    <style>
        .network {
            margin-top: 36px;
        }

        .network>div {
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.5);
            transition: all 300ms ease;
            border-radius: 10px;
            padding-bottom: 3px;
            color: #000839;
            background: linear-gradient(#cfe8ff, #6379b5);
        }

        .network>div:hover {
            box-shadow: none;
        }

        .company .row {
            margin-left: 10px;
        }


        .company .top {
            border-radius: 10px 10px 0px 0px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            background-color: #cfe8ff;
            padding-top: 10px;
            padding-left: 10px;
            padding-right: 10px;
            padding-bottom: 10px;
        }

        .company .top .top-left {
            font-size: 18px;
            color: #504c52;
            font-weight: 700;
        }

        .company .top .top-left span.company-name {
            color: #000839;
        }

        .company .top .top-right {
            margin-left: 0;
            cursor: pointer;
        }

        .top img {
            height: 50px;
            /* display: flex; */
        }

        .contact-no {
            display: none;

        }

        /*  */

        .network>div.company i {
            background: #f0faff;
            color: #6379b5;
            border-radius: 50%;
            padding: 8px;
            font-size: 1.3rem;
            float: right;
        }

        .row {
            font-size: 1.2rem;
        }

        .row-divider {
            padding-top: 2px;
            width: 2rem;
            border-left: 2px solid #ccc;
            line-height: 3.5rem;
        }

        .row-divider1 {
            line-height: 3.5rem;
        }


        @media (max-width: 768px) {
            .network>div {
                /* padding: 5px; */
                max-width: 500px;
                overflow: hidden;
                /* Hide overflowing content */
                white-space: nowrap;

            }


        }
    </style>

    <script>
        // JavaScript to toggle contact_no visibility on click
        $(document).ready(function () {
            $(".company .top .top-right").click(function () {
                $(this).find(".contact-no").toggle();
            });
        });
    </script>
</head>


<!-- CONTENT -->
<section id="content">
    <!-- MAIN -->
    <main>
        <div class="dashboard" style="color:var(--dark)">
            <br>
            <div class="head-title">
                <div class="left">
                    <h2>My Network</h2>
                </div>
                <br>
            </div>
            <hr>
        </div>

        <?php
        $qry = $conn->query("SELECT * from  `retailers` r  where r.delete_flag=0  ");
        while ($row = $qry->fetch_assoc()):
            ?>
            <div class="network">
                <div class=" company">
                    <div class="top">
                        <div class="top-left">
                            <span class="company-name">
                                <img src="../images/company/<?php echo $row["company_logo"] ?>">

                                <?php echo $row['company_name'] ?>
                            </span>, <!-- Make company name bold -->
                            <?php echo $row['address'] ?> <!-- Set address to gray -->
                        </div>

                        <div class="top-right">
                            <i class=" fa fa-phone"></i> <!-- Add icon -->
                            <span class="contact-no">
                                <?php echo $row['contact_no'] ?>
                            </span> <!-- Initially hidden -->
                        </div>
                    </div>

                    <div class=" row">
                        <div class="col-md-4 row-divider1">
                            <p class="card-text">Active Influencers:
                                <?php echo $row['active_influencers']; ?>/110
                            </p>
                        </div>
                        <div class="col-md-4 row-divider">
                            <p class="card-text">Sales(this month):
                                <?php echo $row['sales(this month)']; ?> MT
                            </p>
                        </div>
                        <div class="col-md-4 row-divider">
                            <p class="card-text">Sales (YTD):
                                <?php echo $row['sales(YTD)']; ?> MT
                            </p>
                        </div>
                    </div>

                </div>
            </div>

        <?php endwhile; ?>
    </main>
    <!-- MAIN -->
</section>
<template>
    <div>
        <logo/>


        <div class="page" id="title-page">
            <div class="flex-center">
                <h1 style="text-decoration: underline">Proposal of Website Redesign and Business Integration</h1>
                <div>
                    <h4>Prepared For Dr Windows</h4>
                </div>
            </div>
        </div>

        <div class="page flex-center" id="introduction">
            <!--<h1>Intro</h1>-->
            <p>First of all, Thank you for this opportunity!</p>

            <p>
                In this proposal, I will detail the current problems you are facing and the solutions that will solve
                these problems.
                I will also provide a few ideas for improvement and process optimization.
            </p>
            <p>
                How far we take this is completely up to you. Your input will be required at every step of this process
                to ensure that the final product is everything you need it to be.
            </p>

        </div>


        <div class="page" id="project-goals">
            <h1>Overall Goals</h1>
            <ul>
                <li><strong>Grow</strong> client base by increasing the web presence of Dr Windows</li>
                <li><strong>Increase revenue</strong> by promoting company services - current and new</li>
                <li><strong>Save</strong> time by organizing and streamlining data management</li>
                <li><strong>Strengthen</strong> trust of current and new clients by increasing transparency through a
                    new client login
                </li>
            </ul>
        </div>

        <div class="page" id="problems">
            <h1>Problems</h1>
            <p>Per our conversation, here are a few issues that stand out.</p>

            <hr>
            <ul>
                <h2>Current website is from the 'stone age'</h2>
                <ul><strong>Solution</strong>
                    <li>Create a custom website with a professional design</li>
                    <li>Implement a design that will be accessible from all devices</li>
                </ul>

                <hr>
                <h2>Web Presence is Lacking</h2>
                <ul><strong>Solution</strong>
                    <li>Optimize SEO</li>
                    <li>Create google profile</li>
                    <li>Update Facebook profile</li>
                    <li>Add Dr Windows to Google Maps</li>
                </ul>

                <hr>
                <h2>Current data management is wasting time</h2>
                <ul><strong>Solution</strong>
                    <li>Migrate all data to a secure database</li>
                    <li>Management Console</li>
                    <ul>
                        <li>Detailed and Organized view of all data</li>
                        <li>Create/Edit:</li>
                        <ul>
                            <li>Clients</li>
                            <li>Addresses/Homes</li>
                            <li>Invoices</li>
                            <li>ect..</li>
                        </ul>
                    </ul>
                </ul>


            </ul>

        </div>


        <div class="page" id="potential-new-features">
            <h1>Potential Website Features</h1>
            <p>
                The sky is the limit on what you are able to do with technology. <br>
            </p>

            <hr>
            <ul>
                <h2>Client Login</h2>
                <ul>
                    <li>Job history</li>
                    <li>Download past invoices</li>
                    <li>Request new service</li>
                </ul>

                <hr>
                <h2>Calendar Integration</h2>
                <ul>
                    <li>Allow clients to pick a date/time that works for them</li>
                </ul>


                <hr>
                <h2>Email Integration</h2>
                <ul>
                    <li>Send reminder emails automatically</li>
                </ul>


                <hr>
                <h2>Partner Login</h2>
                <ul>
                    <li>Provide panel for partners to see their schedule</li>
                    <li>View Client and Job Details</li>
                    <li>Mark jobs as paid</li>
                </ul>


                <hr>
                <h2>Online Payments</h2>
                <ul>
                    <li>Allow clients to pay their bill online</li>
                    <li>Send payment reminders</li>
                    <li>Notify Partners when client has paid</li>
                </ul>
            </ul>


            <br>
            <h1>Other Considerations</h1>


            <h2>Logo redesign</h2>
            <p>
                There are many reasons to refresh a company logo.
                <a :href="logo_link">This article</a> details a few of those reasons.
            </p>
            <hr>


        </div>

        <div class="page color-primary" id="phase1-timeline">
            <h1>Phase 1 Timeline</h1>

            <table>
                <tr>
                    <th>Item</th>
                    <th>Start</th>
                    <th>Finish</th>
                </tr>

                <tr>
                    <td>
                        <h2>Data Migration</h2>
                        <ul>
                            <li>Create Virtual Server for website hosting</li>
                            <li>Create database</li>
                            <li>Migrate data</li>
                        </ul>

                        <p>
                            Will require input from you detailing specific business processes in order to better
                            understand
                            what is needed in the database design.
                        </p>
                        <p>
                            We will also need to review the types of data that your workbooks contain.
                        </p>


                        <h2>Result</h2>
                        <p>Your data will be backed up to a live database</p>
                    </td>

                    <td>12/1</td>
                    <td>12/15</td>

                </tr>


                <tr>
                    <td>
                        <h2>New Site</h2>

                        <ul>
                            <li>Consult with designer</li>
                            <li>Implement design</li>
                            <li>Migrate/Create content for website (services, info, ect..)</li>
                        </ul>

                        <h2>Result</h2>
                        <p>The new <a href="mydrwindows.com">mydrwindows.com</a> website will be live</p>
                    </td>
                    <td>1/1</td>
                    <td>2/1</td>
                </tr>

            </table>

        </div>

        <div class="page" id="phase2-timeline">

            <h1>Phase 2 Timeline</h1>

            <table>
                <tr>
                    <th>Item</th>
                    <th>Start</th>
                    <th>Finish</th>
                </tr>

                <tr>
                    <td>
                        <h2></h2>
                        <ul></ul>


                        <!--<h2>Result</h2>-->
                        <p></p>
                    </td>

                    <td></td>
                    <td></td>

                </tr>


            </table>


        </div>

        <div class="page color-secondary" id="terms">
            <h1>Terms</h1>
        </div>


        <div class="page color-primary" id="costs">
            <h1>Costs</h1>
            <p></p>
        </div>

    </div>

</template>

<script>
	export default {
		name: "drwindows",
		data() {
			return {
				//
			};
		},

		beforeCreate() {},
		created() {
			//
		},

		beforeMount() {},
		mounted() {
			$("nav").css('display', 'none');
			$("html, body").css({
				'background-color': '#0069c0',
				'color': 'ivory',
			});
		},
		beforeUpdate() {},
		updated() {},
		activated() {},
		deactivated() {},
		beforeDestroy() {},
		destroyed() {},
		methods: {
			//
		},
		computed: {
			logo_link() {
				return "https://www.forbes.com/sites/gabrielshaoolian/2017/02/07/logo-redesign-what-to-consider-when-its-time-for-a-brand-update/#7aff49d93e99";
			},
			//
		},

		props: {},
		components: {
			'logo': require('../partials/Logo'),
		},
		watch: {},

	};
</script>

<style scoped lang="scss">
    @import "../../../sass/variables";

    $primary: #2196f3;
    $primary_light: #6ec6ff;
    $primary_dark: #0069c0;

    $secondary: #757575;
    $secondary_light: #a4a4a4;
    $secondary_dark: #494949;

    .flex-center {
        flex-direction: column;
        p {
            text-align: center;
        }
    }

    .color-primary {
        background-color: $primary;
        color: ghostwhite;
    }

    .color-secondary {
        background-color: $secondary;
        color: ghostwhite;
        a {
            color: #81d5ff;
        }
    }

    .page {
        font-size: 18px;
        padding: 50px;
        /*min-height: 100vh;*/
        strong {
            font-size: 25px;
        }

        h1 {
            text-decoration: underline;
        }
    }

    #title-page {
        @extend .color-secondary;
        padding: 50px 0;
        min-height: auto;
    }

    #introduction {
        @extend .color-primary;
        min-height: auto;
        p {
            max-width: 50%;
        }
    }

    #project-goals {
        @extend .color-secondary;
    }

    #problems {
        @extend .color-primary
    }

    #potential-new-features {
        @extend .color-secondary
    }

    .page {
        table {
            td, th {
                padding: 10px;
            }

            td {
                border-bottom: 1px solid black;
            }

            tr {
                th:nth-child(1), td:nth-child(1) {
                    width: 50%;
                    background-color: $color-primary-dark;
                }
                th:nth-child(2), td:nth-child(2) {

                    background-color: $color-primary-light;
                    color: $color-primary-dark;
                    max-width: 20px;
                }
                th:nth-child(3), td:nth-child(3) {

                    background-color: $color-primary-dark;
                    max-width: 20px;
                }
            }
        }
    }


</style>
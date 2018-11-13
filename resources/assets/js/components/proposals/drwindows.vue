<template>
    <div>
        <div class="print-page">
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
                <vue-markdown class="text-center">
Thank you for this opportunity!

I firmly believe that my experience with Dr Windows and the window cleaning business will make {{sender.company}} a perfect fit for this project.

As I look through websites of your competitors, I believe {{sender.company}} can make Dr Windows **stand out** as an excellent option for residential and commercial business in {{client.company}}' operating states.

In this proposal I will detail the current problems you are facing and the solutions that will solve these problems. Throughout the process I will also provide ideas for improvement and process optimization.

Your input will be required at every step of this process to ensure that the final product is everything you need it to be.

I am confident that the value brought to {{client.company}} by implementing these solutions will far outweigh the cost.
                </vue-markdown>
            </div>

        </div>



        <div class="page page-break-before" id="project-goals">
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


        <div class="page" id="potential-new-features" style="display: none;">
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
                <a :href="logo_redesign_link">This article</a> details a few of those reasons.
            </p>
            <hr>


        </div>

        <div class="page color-secondary page-break-before" id="phase1-timeline">
            <h1 class="text-center">Timeline</h1>

            <div class="text-center">
                <p>This timeline is an estimated proposal of working times. Some projects could take more, or less, time.</p>
                <p>Deadlines are estimated based on acceptance of this proposal.</p>

            </div>

            <div class="row">
                <h4 class="col col-1">Phase</h4>
                <h2 class="col col-7">Description</h2>
                <h2 class="col col-2 flex-center">Estimated Start Date</h2>
                <h2 class="col col-2 flex-center">Estimated Completion</h2>
            </div>

            <div v-for="row in timeline" class="row">
                <div class="col col-1">
                    <h2>
                        {{timeline.indexOf(row) + 1}}
                    </h2>
                </div>
                <div class="col col-7">
                    <vue-markdown>{{row.item}}</vue-markdown>
                </div>
                <div class="col col-2 flex-center">{{row.start.format('MMM D Y')}}</div>
                <div class="col col-2 flex-center">{{row.end.format('MMM D Y')}}</div>
            </div>

        </div>




        <div class="page color-primary" id="costs">
            <h1 class="text-center">Costs</h1>
            <p class="text-center">
                The following Items correspond with the timeline phases outlined above.
            </p>

            <div class="row">
                <h4 class="col col-1">Phase</h4>
                <h4 class="col"></h4>
                <h6 class="col col-1">Due at Start</h6>
                <h6 class="col col-1">Due at Completion</h6>
                <h5 class="col col-2">Total</h5>
            </div>

            <div class="row" v-for="row in timeline">
                <div class="col col-1">{{timeline.indexOf(row) + 1}}</div>
                <div class="col text-center">
                    <h2>{{row.title}}</h2>
                </div>
                <div class="col col-1">${{row.start_cost}}</div>
                <div class="col col-1">${{row.end_cost}}</div>
                <div class="col col-2">${{row.start_cost + row.end_cost}}</div>
            </div>

            <div class="row">
                <div class="col " style="text-align: right">Total:</div>
                <div class="col col-2 " style="text-align: center">${{timeline_row_total_cost}}</div>
            </div>
            <hr>

            <h1 class="text-center">Recurring Costs</h1>

            <div class="row">
                <h2 class="col"></h2>
                <h5 class="col col-2">Monthly</h5>
                <h5 class="col col-2">Yearly</h5>
            </div>


            <div v-for="row in recurring_costs" class="row">
                <div class="col">
                    <h2>{{row.item}}</h2>
                    <p class="text-center" v-if="row.description">{{row.description}}</p>
                </div>
                <h5 class="col col-2">${{row.monthly}}</h5>
                <h5 class="col col-2">${{yearly(row)}}</h5>
            </div>
            <div class="row">
                <div class="col " style="text-align: right">Total:</div>
                <div class="col col-2 " style="text-align: center">${{total_recurring_costs}}</div>
            </div>


        </div>




        <div class="page color-secondary page-break-before scale-5" id="terms" style="text-align:center">
            <vue-markdown>
# __Terms__


### Authorization
{{client.company}} is engaging {{sender.company}}, as an independent contractor for the project outlined
above.
Summarized as
__**the Development, deployment, hosting, & support of new and redesigned {{client.company}} Website**__

---

### Completion
{{client.company}} and {{sender.company}} will collaborate to complete the project in a timely manner.
{{sender.company}} agrees to work expeditiously to complete the project no later than {{launch_date}}
(depending on date of acceptance of agreement)

---

### Payment
Fees to {{sender.company}} are due in accordance with the above listed pricing table. Fees for monthly
services will be invoices on the 1st business day of each calendar month, and are due on a net-30 basis.

---

### Assignment of Project
{{sender.company}} reserves the right to assign subcontractors to this project to insure the right fit
for
the job as well as on-time completion.

---

### Revision During Execution
{{client.company}} may be charged additional fees if it decides to make changes to the agreed upon
project
scope and objectives. Small modifications may be acceptable.

---


### Legal & License
{{sender.company}} warrants that the functionality contained in this project will meet
{{client.company}}
requirements and that the operation will be reasonably error-free.

The entire risk as to the quality and performance of the project is with {{client.company}}. In no event
will {{sender.company}} be liable to {{client.company}} or any third party for any damages, including
any
lost profits, lost savings or other incidental, consequential or special damages arising out of the
operation of or inability to operate the website, even if {{sender.company}} has been advised of the
possibility of such damages.
If any provision of this agreement shall be unlawful, void, or for any reason unenforceable, then that
provision shall be deemed severable from this agreement and shall not affect the validity and
enforceability
of any remaining provisions.

---

### Copyrights & Trademarks
{{client.company}} represents to {{sender.company}} and unconditionally guarantees that any elements
furnished to {{sender.company}} for inclusion in the project are owned by {{client.company}}, or that
{{client.company}} has permission from the rightful owner to use each of these elements, and will hold
harmless, protect, and defend {{sender.company}} and its subcontractors from any claim or suit arising
from
the use of such elements furnished by {{client.company}}.


---
            </vue-markdown>

            <vue-markdown class="print-page pt-5">

### Copyright to Project
{{sender.company}} guarantees that all aspects of design and construction of the project will be disclosed
to {{client.company}} upon completion, and full code, copyrights and ownership will be the sole property of
{{client.company}}. {{sender.company}} retains the right to display graphics and other design elements as
examples of its work in its portfolio.

---

### Sole Agreement
The agreement contained in this Contract constitutes the sole agreement between {{sender.company}} and
{{client.company}} regarding this project. Any additional work not specified in this contract must be
authorized by a written change order. All prices specified in this contract will be honored for three (6)
months after both parties sign this contract. Continued services after that time will require a new
agreement.

---

### Initial Payment & Refund Policy
This agreement begins with an initial payment indicated in the pricing table above. If {{client.company}}
halts work and applies for a refund within 4 days, work completed shall be billed at the hourly rate of
{{Hourly.Rate}}, and deducted from the initial payment, the balance of which shall be returned to
{{client.company}}. If, at the time of the request for refund, work has been completed beyond the amount
covered by the initial payment, {{client.company}} shall be liable to pay for all work completed at the
hourly rate stated above. No portion of this initial payment will be refunded unless requested within 4 days
of signing this contract.

---
</vue-markdown>

<vue-markdown class="noprint">
### Acceptance

If all parties are in agreement of these terms, {{sender.company}} will provide a printed copy of this proposal
for both parties to review and sign.
Contact Ethan Brace if these terms are acceptable or to request alternative terms.
</vue-markdown>

<vue-markdown class="print-only">

### Acceptance

This agreement becomes effective when signed by parties of {{sender.company}} and {{client.company}}

</vue-markdown>
        </div>

        <div id="signatures" class="flex-center print-only">
            <div class="row">
                <div class="col">
                    <span class="sign-here">
                        <i>{{client.company}}</i>
                    </span>
                    <span class="sign-here">
                        <i>Date</i>
                    </span>

                </div>
                <div class="col">
                    <span class="sign-here">
                        <i>{{sender.company}}</i>
                    </span>
                    <span class="sign-here">
                        <i>Date</i>
                    </span>

                </div>

            </div>

        </div>

    </div>

</template>

<script>
	import VueMarkdown from 'vue-markdown';
	import moment from 'moment'

	export default {
		name: "drwindows",
		data() {
			return {
				recurring_costs:[
                    {
						item:"First Year of Support",
						description:'Hosting and Support for 2019',
						monthly:0,

                    },
                    {
                    	item:"Support starting 2020",
                        description:'Maintain server and website. Optimize as necessary.',
						monthly:20,
                    },
					{
						item:"Hosting",
						description:'',
						monthly:15,
					}
                ],


                Hourly:{
					Rate: "$100/hr",
                },

				sender: {
					company:"Brace Yourself Solutions"
                },
				client: {
					company:"Dr Windows"
                },
				timeline: [
					{
						title:"Data Migration",
						item: `
### Data Migration
- Create Virtual Server for website hosting
- Create database
- Clean (parse) data into an organized structure
- Migrate data

Will require input from you detailing specific business processes in order to better understand what is needed in the database design.

We will also need to review the types of data that your workbooks contain.

### Result
A private server will be set up and configured specifically for Dr Windows Operations
Your data will be backed up to a live database
You will be provided access to this server and database
						`,
						start:moment('2018-12-01'),
						end:moment('2018-12-30'),
                        start_cost:1500,
						end_cost:1500,
					},
					{
						title:"Enable New Website",
						item: `
### New Website
- Consult with designer
- Implement design
    - Build website coding and backend
    - Consult with Dr Windows to build website to specifications
- Migrate/Create content for website (services, info, ect..)

### Result
The new mydrwindows.com website will be live
						`,
						start: moment('2019-01-01'),
						end:moment('2019-02-01'),
                        start_cost:1500,
						end_cost:1500
					},

					{
						title:"Feature: User Authentication",
						item: `

### User Authentication
- Enable admin login
    - create service request for clients
    - add new clients, addresses, partners, ect..
    - view/edit entire database with simple interface
- and Clients
    - to schedule service
    - view history
    - update information

### Result
Anyone who chooses will be able to create an account with Dr Windows.
You will be able to create accounts for anyone you choose.
You will be able to set the role of any user. (partner, client, other)
						`,
						start: moment('2019-02-01'),
						end: moment('2019-03-01'),
                        start_cost:3000,
						end_cost:3000
					},
				],

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
            yearly(recurring_cost){
                return recurring_cost.monthly * 12;
            }
		},
		computed: {
			launch_date() {
				return this.timeline[this.timeline.length - 1].end.format('MMM D Y')
            },

			total_recurring_costs() {
				let total = 0;
				_.forEach(this.recurring_costs, item =>{
                    total += this.yearly(item);
                });
                return total;
            },
			timeline_row_total_cost() {
                let total = 0;
                _.forEach(this.timeline, row =>{
					total += row.start_cost + row.end_cost;
                })
                return total;
            },
			logo_redesign_link() {
				return "https://www.forbes.com/sites/gabrielshaoolian/2017/02/07/logo-redesign-what-to-consider-when-its-time-for-a-brand-update/#7aff49d93e99";
			},
			//
		},

		props: {},
		components: {
			'vue-markdown': VueMarkdown,
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


        strong {
            font-size: 25px;
        }

        h1 {
            text-decoration: underline;
            text-align: center;
        }

        .col {
            padding: 10px;
            border-bottom: 1px solid black;
        }

        .row {

            h1, h2, h3, h4, h5, h6{
                margin:0;
                text-align:center;
                vertical-align: center;

            }
            .col:nth-child(1) {
                background-color: $color-primary-dark;
            }
            .col:nth-child(2) {
                background-color: $color-primary-light;
                color: $color-primary-dark;
            }
            .col:nth-child(3) {
                background-color: $color-primary-dark;
                text-align:center;
            }
            .col:nth-child(4) {
                background-color: $color-primary-light;
                color: $color-primary-dark;
                text-align:center;
            }
            .col:nth-child(5) {
                background-color: $color-primary-dark;
                text-align:center;
            }
        }



        @media (max-width: 764px){
            padding:15px;
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
    #signatures{
        padding:50px 0;
        .col{
            h1{
                text-decoration: underline;
            }
            width: 42vw;
            text-align: center;
            font-size: 28px;

            .sign-here{
                text-align:left;
                border-bottom: black 1px solid;
                padding-top: 49px;
                width: 100%;
                display: block;
                i{
                    position: relative;
                    top: 40px;
                }
            }

        }
    }

</style>

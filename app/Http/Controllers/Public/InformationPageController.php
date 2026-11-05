<?php

namespace App\Http\Controllers\Public;

use App\Http\Controllers\Controller;
use Illuminate\View\View;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class InformationPageController extends Controller
{
    private const PAGES = [
        'about' => [
            'title' => 'A wider view of investing',
            'intro' => 'A considered way to explore investment categories and follow documented account activity.',
            'sections' => [
                ['title' => 'Built for clarity', 'body' => 'The platform is being developed to connect opportunity information, legal documents, verified account activity, and investor reporting in one place.'],
                ['title' => 'No implied ownership', 'body' => 'A company, product, brand, property, or digital asset appearing as a category does not mean that an investment or ownership interest is available. Any future offer must describe its legal structure and supporting rights.'],
                ['title' => 'Designed to grow carefully', 'body' => 'International availability depends on legal review, investor eligibility, identity controls, and service providers in each jurisdiction.'],
            ],
        ],
        'trust' => [
            'title' => 'Trust and service status',
            'intro' => 'A clear record of what Commonwealth currently provides, what it does not provide, and what must be verified before any live investment service.',
            'facts' => [
                ['label' => 'Reviewed investment offers', 'value' => 'None currently listed'],
                ['label' => 'Deposits and withdrawals', 'value' => 'Not available'],
                ['label' => 'Asset custody', 'value' => 'Not provided'],
                ['label' => 'Operator and provider details', 'value' => 'Not yet published'],
            ],
            'sections' => [
                ['title' => 'Who operates the service', 'body' => 'This website does not currently publish a verified operating entity, regulated provider, or supported-market list. It makes no claim of regulatory approval, authorization, or licensing. Any future service should identify its operator and providers so visitors can verify them independently.'],
                ['title' => 'What is available today', 'body' => 'Commonwealth provides general research information. The reviewed-offers catalogue currently contains no live offerings. The platform does not accept deposits, withdrawals, or investment orders and does not provide asset custody. Creating an account does not change this status.'],
                ['title' => 'Research, images, and affiliations', 'body' => 'References to companies, products, brands, sports leagues, studios, and assets identify research topics only. They do not establish ownership rights, available securities, or an affiliation or endorsement. Images are illustrative. These pages do not publish live prices, valuations, or investment performance.'],
                ['title' => 'What a future offer should disclose', 'body' => 'Before any offer is listed, its materials should identify the issuer and legal instrument, the rights offered, supported jurisdictions and eligibility, fees, liquidity limits, custody and service providers, material risks, source dates, and governing documents. This describes a review standard; it does not mean an offer exists.'],
                ['title' => 'Account and administrative controls', 'body' => 'Account and administrative access uses verified email and permission checks. Administrative sign-ins and investor account-status changes are recorded in audit logs. Commonwealth does not claim an independent security certification or penetration-test result.'],
                ['title' => 'Policy readiness', 'body' => 'The Terms, Privacy, and AML/KYC pages are marked as working drafts. They require completion for the confirmed operating entity and launch markets before any live financial service begins.'],
            ],
            'links' => [
                ['label' => 'Terms and conditions', 'route' => 'terms'],
                ['label' => 'Privacy notice', 'route' => 'privacy'],
                ['label' => 'Risk disclosure', 'route' => 'risk-disclosure'],
                ['label' => 'AML and identity information', 'route' => 'aml-kyc'],
                ['label' => 'Contact the platform', 'route' => 'contact'],
            ],
        ],
        'how-it-works' => [
            'title' => 'How the platform is intended to work',
            'intro' => 'A transparent flow from account setup to documented records.',
            'sections' => [
                ['title' => '1. Create and verify an account', 'body' => 'Investors create an account, verify their email, and complete any identity and eligibility checks required for the relevant market.'],
                ['title' => '2. Review a documented offer', 'body' => 'An opportunity is displayed only after review of its legal structure, risk disclosures, terms, and investor-facing documentation.'],
                ['title' => '3. Fund through an approved provider', 'body' => 'If funding is enabled in a jurisdiction, the payment method, network, amount, fees, and status are recorded and independently reconciled.'],
                ['title' => '4. Track verified activity', 'body' => 'Account balances are derived from posted ledger records. Distributions and valuations require documented source data; no return is assumed or guaranteed.'],
            ],
        ],
        'payment-methods' => [
            'title' => 'Payment methods',
            'intro' => 'No deposits, withdrawals, or cryptocurrency transfers are currently enabled.',
            'sections' => [
                ['title' => 'Before payments go live', 'body' => 'The platform must select an eligible payment provider, complete legal and compliance review, configure transaction monitoring, and test reconciliation and withdrawal controls.'],
                ['title' => 'Cryptocurrency networks', 'body' => 'Any future cryptocurrency deposit flow must show the exact asset and network, verify destination and amount, independently confirm on-chain transactions, prevent duplicate credits, and never request private keys or seed phrases.'],
                ['title' => 'Current status', 'body' => 'This page describes planned safeguards only. It does not provide a wallet address and does not accept payment.'],
            ],
        ],
        'faq' => [
            'title' => 'Frequently asked questions',
            'intro' => 'Straight answers about Commonwealth and current service availability.',
            'sections' => [
                ['title' => 'Can I invest today?', 'body' => 'No. Live investment subscriptions and payment operations are disabled. Availability will be updated only after the required legal, compliance, and provider approvals are complete.'],
                ['title' => 'Are the listed brands or companies available as investments?', 'body' => 'Category references do not imply that any company, brand, product, intellectual property, or security has offered an investment. A future listing would require documented legal rights and review.'],
                ['title' => 'Are returns guaranteed?', 'body' => 'No. No return is guaranteed. An investment may lose value or all invested capital.'],
                ['title' => 'How are balances calculated?', 'body' => 'When posted account activity exists, balances are calculated from ledger entries. Sample balances are not displayed.'],
                ['title' => 'Which countries are supported?', 'body' => 'No jurisdiction is currently approved for live investing. Availability will be published only after country-specific legal and operational review.'],
            ],
        ],
        'terms' => [
            'title' => 'Terms and conditions — working draft',
            'draft' => true,
            'intro' => 'This draft describes the current development site only and is not a final agreement for any live investment service.',
            'sections' => [
                ['title' => 'Platform status', 'body' => 'The platform is under development. It does not currently accept investment orders, deposits, withdrawals, or custody instructions.'],
                ['title' => 'No offer or advice', 'body' => 'Site content is general information, not an offer, solicitation, recommendation, or personalized investment advice.'],
                ['title' => 'Risk', 'body' => 'Investments involve risk and may result in loss of some or all capital. Terms for any future offering will be set out in its governing documents.'],
                ['title' => 'Review required', 'body' => 'These terms must be reviewed by qualified counsel for each intended jurisdiction before public launch or live operations.'],
            ],
        ],
        'privacy' => [
            'title' => 'Privacy notice — working draft',
            'draft' => true,
            'intro' => 'This draft describes intended data handling for the development platform and must be completed before launch.',
            'sections' => [
                ['title' => 'Data collected', 'body' => 'The application may process account identity and contact details, authentication records, investor profile data, support inquiries, and transaction records when those features are enabled.'],
                ['title' => 'Use and protection', 'body' => 'Data is used to provide account access, security, support, compliance checks, and auditability. Sensitive profile fields are encrypted; uploaded identity and legal documents must use private storage with access checks.'],
                ['title' => 'Sharing and retention', 'body' => 'No provider or retention schedule is claimed here. The final notice must identify service providers, legal bases, cross-border transfers, retention periods, user rights, and contact details.'],
                ['title' => 'Review required', 'body' => 'A privacy professional must complete this notice for the jurisdictions in which the service will operate.'],
            ],
        ],
        'risk-disclosure' => [
            'title' => 'Investment risk disclosure',
            'intro' => 'This general summary is not a substitute for the specific risk factors in an offering’s governing documents.',
            'sections' => [
                ['title' => 'Loss of capital', 'body' => 'Investment values can decline. Investors may lose some or all of the amount invested.'],
                ['title' => 'Liquidity and valuation', 'body' => 'Private business, property, and alternative investments can be difficult to value or sell. Withdrawals may be limited by legal terms, market conditions, or available liquidity.'],
                ['title' => 'Digital assets', 'body' => 'Digital assets can be volatile and are exposed to technology, cybersecurity, network, custody, regulatory, and counterparty risks.'],
                ['title' => 'No projected performance', 'body' => 'The platform does not publish fabricated or hypothetical returns as actual results. Historical or projected figures, if ever shown, must be sourced, labelled, and accompanied by applicable disclosures.'],
            ],
        ],
        'aml-kyc' => [
            'title' => 'AML and identity verification — working draft',
            'draft' => true,
            'intro' => 'This page is a development-stage outline, not a complete compliance program.',
            'sections' => [
                ['title' => 'Identity and eligibility', 'body' => 'Before any live service, account verification, beneficial ownership checks where relevant, investor eligibility, and jurisdiction restrictions must be defined and operational.'],
                ['title' => 'Screening and monitoring', 'body' => 'A live program requires approved sanctions and AML screening, risk-based transaction monitoring, escalation, record keeping, and suspicious activity procedures.'],
                ['title' => 'No live transactions', 'body' => 'Deposits, withdrawals, custody, and investment subscriptions are currently disabled.'],
                ['title' => 'Review required', 'body' => 'Qualified compliance counsel and service providers must approve the controls for each operating jurisdiction before launch.'],
            ],
        ],
    ];

    public function show(string $page): View
    {
        if (! isset(self::PAGES[$page])) {
            throw new NotFoundHttpException();
        }

        return view('info.show', [
            'page' => self::PAGES[$page],
            'slug' => $page,
        ]);
    }
}
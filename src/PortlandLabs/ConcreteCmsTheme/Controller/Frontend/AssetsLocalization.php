<?php

/**
 * @project:   ConcreteCMS Theme
 *
 * @copyright  (C) 2021 Portland Labs (https://www.portlandlabs.com)
 * @author     Fabian Bitter (fabian@bitter.de)
 */

namespace PortlandLabs\ConcreteCmsTheme\Controller\Frontend;

use Concrete\Core\Controller\Controller;
use Concrete\Core\Http\Response;
use Concrete\Core\Http\ResponseFactoryInterface;

class AssetsLocalization extends Controller
{

    /**
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function getCommunityJavascript()
    {
        /** @noinspection PhpComposerExtensionStubsInspection */
        $content = 'var ccmi18n_community = ' . json_encode([
                "dialogTitle" => t("Send Message"),
                "receiverLabel" => t("Send To"),
                "subjectLabel" => t("Subject"),
                "attachmentsLabel" => t("Attachments"),
                "messageLabel" => t("Message"),
                "sendButton" => t("Send"),
                "cancelButton" => t("Cancel"),
                "editShowcaseItemDialogTitle" => t("Edit Showcase"),
                "addShowcaseItemDialogTitle" => t("Create Showcase"),
                "saveButton" => t("Save"),
                "siteUrl" => t("Site URL"),
                "title" => t("Title"),
                "shortDescription" => t("Short Description"),
                "requiredImage" => t("Required Image"),
                "additionalImage1" => t("Additional Image 1"),
                "additionalImage2" => t("Additional Image 2"),
                "additionalImage3" => t("Additional Image 3"),
                "uploadNotice" => t("540 x 300px jpg no larger than 2MB"),
                "uploadButton" => t("Upload Image"),
                "confirm" => t("Are you sure?"),
                "userSearch" => [
                    'currentlySelected' => t('Currently Selected'),
                    'emptyTitle' => t('Search Users'),
                    'errorText' => t('Unable to retrieve results'),
                    'searchPlaceholder' => t('Search...'),
                    'statusInitialized' => t('Start typing a search query'),
                    'statusNoResults' => t('No Results'),
                    'statusSearching' => t('Searching...'),
                    'statusTooShort' => t('Please enter more characters'),
                ]
            ]) . ';';

        return $this->createJavascriptResponse($content);
    }

    /**
     * @param string $content
     *
     * @return \Symfony\Component\HttpFoundation\Response
     */
    private function createJavascriptResponse($content)
    {
        /** @var ResponseFactoryInterface $rf */
        $rf = $this->app->make(ResponseFactoryInterface::class);

        return $rf->create(
            $content,
            Response::HTTP_OK,
            [
                'Content-Type' => 'application/javascript; charset=' . APP_CHARSET,
                'Content-Length' => strlen($content),
            ]
        );
    }
}
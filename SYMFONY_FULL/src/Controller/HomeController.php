<?php

namespace App\Controller;

use Google\Client;
use Google_Service_YouTube;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;


class HomeController extends AbstractController
{

    /**
     * @Route("/", name="home")
     */
    public function index(Request $request): Response
    {   
        $client = new Client();
        
        $client->setAccessType("offline");
        $client->setApplicationName('lolilol');
        $client->setAuthConfigFile(__DIR__ . '/../../google.json');
        $client->addScope(GOOGLE_SERVICE_YOUTUBE::YOUTUBE_FORCE_SSL);
        var_dump($request->getSession()->get('access_token'));
        $client->setAccessToken(['access_token' => 'ya29.a0AfH6SMBPUc6J8FNO5SP7N8Zq9Y_yYZ0lty14VL3BS2NZ0zDpdPWbdYD6_p-uXil3rrkgL74R8CM6zMwrAcvwD4xayBfANaVuQbjp-5UhsKj3Myt1ircyDMeqqeUr9rYpzrJKLAGIJcVNJlDak-AYH5Dr9XPXBg']);
        /*if($client){
            return $this->redirectToRoute('aouth2');
        }*/
        $youtube = new Google_Service_YouTube($client);
        $video = $youtube->videos->listVideos(['status'], ['id' => 'aXhoDqRVoEg'])->items[0];
        $videoStatus = $video->status;

        $videoStatus->privacyStatus = 'unlisted';
        $video->setStatus($videoStatus);
        $youtube->videos->update('status', $video);
        var_dump($video->status);
        //$videoStatus->privacyStatus = 'private';
        //$video->setStatus($videoStatus);
        //$youtube->videos->update('status', $video);
        //var_dump($video->status);


        $channel = $youtube->channels->listChannels('snippet', array('mine' => true));
        $playlist = $youtube->playlists->listPlaylists('snippet', ['mine' => true]);
        
        return $this->render('home/index.html.twig', [
            'youtube' => $youtube,
            'video' => $youtube->videos->listVideos(['snippet','player'], ['id' => 'aXhoDqRVoEg'])->items[0],
            'list_channel' => $channel,
            'list_playlist' => $playlist,
        ]);
    }

    /**
     * @Route("/embed")
     */
    public function embed(Request $request): Response
    {
        $client = new Client();
        
        $client->setAccessType("offline");
        $client->setApplicationName('lolilol');
        $client->setAuthConfigFile(__DIR__ . '/../../google.json');
        $client->addScope(GOOGLE_SERVICE_YOUTUBE::YOUTUBE_FORCE_SSL);
        var_dump($request->getSession()->get('access_token'));
        $client->setAccessToken(['access_token' => 'ya29.a0AfH6SMBPUc6J8FNO5SP7N8Zq9Y_yYZ0lty14VL3BS2NZ0zDpdPWbdYD6_p-uXil3rrkgL74R8CM6zMwrAcvwD4xayBfANaVuQbjp-5UhsKj3Myt1ircyDMeqqeUr9rYpzrJKLAGIJcVNJlDak-AYH5Dr9XPXBg']);
        $youtube = new Google_Service_YouTube($client);
        var_dump($youtube->videos->listVideos(['status'], ['id' => 'aXhoDqRVoEg'])->items[0]);
        
        $video = $youtube->videos->listVideos(['status'], ['id' => 'aXhoDqRVoEg'])->items[0];
        
        $videoStatus = $video->status;

        $videoStatus->privacyStatus = 'private';
        $video->setStatus($videoStatus);
        $youtube->videos->update('status', $video);
        var_dump($video->status);
        return $this->json($status = 200);
    }

    /**
     * @Route("/login", name="login")
     */
    public function login(Request $request)
    {
        $client = new Client();
        
        $client->setAccessType("offline");
        $client->setApplicationName('lolilol');
        $client->setAuthConfigFile(__DIR__ . '/../../google.json');
        $client->addScope(GOOGLE_SERVICE_YOUTUBE::YOUTUBE_FORCE_SSL);
        $session = $request->getSession()->get('access_token');

        if ($session != null && $session) {
            
            $client->setAccessToken($session);

        } else {
            return $this->redirectToRoute('aouth2');
        }

        return $this->redirectToRoute('home');
    }

    /**
     * @Route("/aouth2", name="aouth2")
     */
    public function aouth2(Request $request): Response
    {

        $client = new Client();
        
        $client->setAccessType("offline");
        $client->setApplicationName('lolilol');
        $client->setAuthConfigFile(__DIR__ . '/../../google.json');
        $client->addScope(GOOGLE_SERVICE_YOUTUBE::YOUTUBE_FORCE_SSL);
        $client->setRedirectUri('http://' . $_SERVER['HTTP_HOST'] . '/aouth2');

        if (!isset($_GET['code'])) {
            $auth_url = $client->createAuthUrl();
            return $this->redirect($auth_url);

        } else {
            
            $client->authenticate($_GET['code']);
            $request->getSession()->set('access_token', $client->getAccessToken());
            return $this->redirectToRoute('home');
        }
    }
}

package main

import (
	"log"
	"net/http"
	"os"
	"fmt"
	"github.com/line/line-bot-sdk-go/linebot"
)

func mainLine(w http.ResponseWriter, req *http.Request) {
	fmt.Fprintf(w, "Welcome to the HomePage!")
	fmt.Println("Endpoint Hit: homePage")
}

func callbackLine(w http.ResponseWriter, req *http.Request) {

	bot, err := linebot.New(os.Getenv("CHANNEL_SECRET"), os.Getenv("CHANNEL_TOKEN"))

	if err != nil { log.Fatal(err) }

	events, err := bot.ParseRequest(req)

	if err != nil {
		if err == linebot.ErrInvalidSignature {
			w.WriteHeader(400)
		} else {
			w.WriteHeader(500)
		}
		return
	}

	for _, event := range events {
		if event.Type == linebot.EventTypeMessage {
			switch message := event.Message.(type) {
			case *linebot.TextMessage:
				if _, err = bot.ReplyMessage(event.ReplyToken, linebot.NewTextMessage(message.Text)).Do(); err != nil {
					log.Print(err)
				}
			}
		}
	}

	// This is just sample code.
	// For actual use, you must support HTTPS by using `ListenAndServeTLS`, a reverse proxy or something else.
	if err := http.ListenAndServe(":" + os.Getenv("PORT"), nil); err != nil {
		log.Fatal(err)
	}

}

func handleRequests() {
	http.HandleFunc("/", mainLine)
	http.HandleFunc("/callback", callbackLine)
	log.Fatal(http.ListenAndServe(":8081", nil))
}

func main() {

	handleRequests()

}
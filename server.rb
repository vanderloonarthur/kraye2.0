require 'webrick'

# Define a class for handling requests
class MyServer < WEBrick::HTTPServlet::AbstractServlet
  def do_GET(request, response)
    response.status = 200
    response['Content-Type'] = 'text/html'
    response.body = <<-HTML
      <!DOCTYPE html>
      <html>
      <head>
        <title>GET Request Example</title>
      </head>
      <body>
        <h1>Hello, GET request!</h1>
        <p>This is a simple GET request example.</p>
      </body>
      </html>
    HTML
  end

  def do_POST(request, response)
    # Respond to POST request
    if request.path == "/submit_feedback"
      response.status = 200
      response['Content-Type'] = 'text/html'
      response.body = <<-HTML
        <!DOCTYPE html>
        <html>
        <head>
          <title>POST Request Example</title>
        </head>
        <body>
          <h1>Feedback Submitted Successfully!</h1>
          <p>Received data:</p>
          <pre>#{request.body}</pre>
        </body>
        </html>
      HTML
    else
      response.status = 404
      response.body = "Page not found"
    end
  end
end

# Configure server to listen on port 4000
server = WEBrick::HTTPServer.new(Port: 4000)

# Mount servlet to handle all requests
server.mount '/', MyServer

# Gracefully shutdown server on interrupt (Ctrl+C)
trap('INT') { server.shutdown }

# Start the server
server.start

rs.initiate(
    {
        _id: "rs0",
        members: [
            { _id: 0, host: "192.168.1.144:27017" },
            { _id: 1, host: "192.168.1.144:27018" },
            { _id: 2, host: "192.168.1.122:27019", arbiterOnly: true }
        ]
    }
);
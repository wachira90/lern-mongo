rs.initiate(
    {
        _id: "rs0",
        members: [
            { _id: 0, host: "192.168.1.10:27017" },
            { _id: 1, host: "192.168.1.10:27018" },
            { _id: 2, host: "192.168.1.10:27019", arbiterOnly: true }
        ]
    }
);